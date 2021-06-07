<?php

namespace App\Http\Controllers;


use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\bots;
use App\Models\LabeledPrices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Invoices']=Invoice::paginate(100);
        return view ('Invoices.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $bots = bots::all();
        return view ('Invoices.create', compact('products', 'bots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    // public function post()
    // {  
    //     $products = Product::all();
    //     $bots = bots::all();

    //     $producto = request('product');
    //     $bot1 = request('bot');
    //     return view ('Invoices.info', compact('producto', 'bot1','products','bots'));
    // }

    public function filtrar()
    {  
        $producto = request('product');
        $bot1 = request('bot');
        $Products = DB::select('select * from products where id = ' . $producto);
        $Bots = DB::select('select * from bots where id = ' . $bot1);

        return view('Invoices.form',['Products'=> $Products],['Bots' => $Bots]);
    }

    public function SendInvoice(){
        $url = "https://api.telegram.org/bot" . request('bot_token') . "/sendInvoice";
        $chat_id = request('chat_id');
        $title = request('producto');
        $description = request('description');
        $payload = request('payload');
        $provider_token = request('provider_token');
        $currency = request('currency');
        $precio = request('price') * 100;
        
            $product = new LabeledPrices();
            $product->label = 'product';
            $product->amount = $precio;
            
            $tax = new LabeledPrices();
            $tax->label = 'iva';
            $tax->amount = $precio * 21 / 100;

        $prices = array($product, $tax);
        

        $object = new Invoice();
        $object->url = $url;
        $object->chat_id = $chat_id;
        $object->title = $title;
        $object->description = $description;
        $object->payload = $payload;
        $object->provider_token = $provider_token;
        $object->currency = $currency;
        $object->prices = $prices;

        $data = json_encode( $object );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result, true);

        $productid = request('product_id');

        $ok = $json['ok'];

        if ($ok == true) {
            DB::table('invoices')->insert([
                'price' => request('price'),
                'userid' => Auth::user()->id,
                'productid' => $productid,
              ]);
        }

        $Invoices = DB::select('select * from invoices');
        return view('Invoices.index',['Invoices'=>$Invoices]);
    }
}
