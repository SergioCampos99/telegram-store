<?php

namespace App\Http\Controllers;


use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\bots;
use Illuminate\Support\Facades\DB;

use Formapro\TelegramBot\Bot;
use Formapro\TelegramBot\Update;
use Formapro\TelegramBot\SendInvoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Invoices']=Invoice::paginate(2);
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
        $requestBody = file_get_contents('php://input');
        $data = json_decode($requestBody, true);
        
        $update = Update::create($data);
        $payload = []; // any params which you need to proccess in the transaction
        $providerToken = 'something:like:this'; // Token have to be taken from botFather
        
        $sendInvoice = new SendInvoice(
            $update->getMessage()->getChat()->getId(),
            'Your title',
            'Your description of invoice',
            json_encode($payload), 
            $providerToken,
            '12314czasdq', // unique id
            'UAH',
            [new LabeledPrice('PriceLabel_1', 3001)] // amount; here 30.01 UAH
        );
        
        $bot = new Bot('telegramToken');
        $bot->sendInvoice($sendInvoice);   
    }
}
