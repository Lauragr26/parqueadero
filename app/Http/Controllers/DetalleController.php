<?php

namespace App\Http\Controllers;

use App;
use App\Vehiculo;
use App\Cliente;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = App\Cliente::orderby('nombre', 'asc')->get();
        $vehiculos = App\Vehiculo::orderby('placa', 'asc')->get();
        $detalles = App\Detalle::orderby('horaentrada', 'asc')->get();
        return view('detalle.index', compact('clientes','vehiculos','detalles'));
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
            'horaentrada' => 'required',
            'idCliente' => 'required',
            'idVehiculo' => 'required',
        
        ]);

        App\Detalle::create($request->all());

        return redirect()->route('detalle.index')
                        ->with('exito', 'Entrada Registrada con exito');
    }

 
    public function show( $id)
    {
        //
    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.index')
                ->with('exito', 'Registro Eliminado');
    }
}
