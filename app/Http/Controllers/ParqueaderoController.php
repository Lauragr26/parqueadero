<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class ParqueaderoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parqueaderos = App\Parqueadero::orderby('cupo', 'asc')->get();
        return view('parqueadero.index', compact('parqueaderos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cupo' => 'required',
        
        ]);

        App\Parqueadero::create($request->all());

        return back()->withRegcupo(__('Cupo guardado con exito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);
        return view('parqueadero.edit', compact('parqueadero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cupo' => 'required'            
        ]);
        
        $parqueadero = App\Parqueadero::findorfail($id);
        $parqueadero->update($request->all());

        return redirect()->route('parqueadero.index')
                        ->with('exito', 'Cupo Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);
        $parqueadero->delete();

        return redirect()->route('parqueadero.index')
                         ->with('exito', 'Cupo Eliminado con exito');
    
    }
}
