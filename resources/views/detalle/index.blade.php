@extends('layouts.app', ['activePage' => 'entradas'])

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <div class="header"><strong>Ups.</strong> Algo anda mal...</div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
    
@endif

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="" autocomplete="off" class="form-horizontal">
            @csrf
  
            @if (session('exito'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('exito') }}</span>
                </div>
              </div>
            </div>
          @endif

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Entrada') }}</h4>
                <p class="card-category">{{ __('Registrar Hora de Entrada') }}</p>
              </div>
              <div class="card-body ">
           
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Nombre Cliente') }}</label>
                  <div class="col-sm-5">
                    <div class="input-field">
                      <select name="idCliente" type="text" value="" required="true" class="form-control">
                        <option value="" disabled selected>Seleccione Nombre</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Placa Vehiculo') }}</label>
                  <div class="col-sm-5">
                    <div class="input-field">
                      <select name="idVehiculo" type="text" value="" required="true" class="form-control">
                        <option value="" disabled selected>Seleccione Placa</option>
                        @foreach ($vehiculos as $vehiculo)
                            <option value="{{$vehiculo->id}}">{{$vehiculo->placa}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
  
                <div class="row">
                  <label class="col-sm-2 col-form-label">Hora de Entrada:</label>
                  <div class="col-sm-5">
                  <input type="time" class="form-control" name="horaentrada" value="{{old('scheduled_time',date('H:i'))}}"/>
                  </div>
                </div>

                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row"> 
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Información </h4>
                  <p class="card-category"> Detalle de Parqueo </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                   
                        <th>
                          Cliente
                        </th>
                        <th>
                          Placa Vehiculo
                        </th>
                        <th>
                          Hora Entrada
                        </th>

                      </thead>
                      <tbody>
                        @foreach ($detalles as $detalle)
                        <tr>
                          <td>{{$detalle->idCliente}}</td>                                                     
                          <td>{{$detalle->idVehiculo}}</td>                          
                          <td>{{$detalle->horaentrada}}</td>                          
                          <td class="td-actions text-right">
                                          
                            <form action="{{route('detalle.destroy', $detalle->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection