<?php

namespace App\Http\Controllers;

use App\Models\bots;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; 

class BotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['bots']=bots::paginate(2);
        return view ('bots.index', $datos);
    }
    public function welcome()
    {
        return view ('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //añadir el return view con la vista de los bots
        return view ('bots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //almacenar el bot en la base de datos
        $botdata = request()->except('_token');
        bots::insert($botdata);
        return redirect('bots')->with('mensaje','¡Bot agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function show(bots $bots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bots=bots::findOrFail($id);
        
        return view('bots.edit', compact('bots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $botdata = request()->except(['_token','_method']);

        bots::where('id','=',$id)->update($botdata);

        $bots=bots::findOrFail($id);
        return redirect('bots')->with('mensaje', 'Bot editado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bots=bots::findOrFail($id);
        bots::destroy($id);
        return redirect('bots')->with('mensaje', 'Bot eliminado de su lista.');
    }
}
