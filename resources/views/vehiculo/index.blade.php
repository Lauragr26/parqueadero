@extends('layouts.app', ['activePage' => 'vehiculos'])

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
                <form action="{{ route('vehiculo.store') }}" method="post" autocomplete="off" class="form-horizontal">
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
                          <h4 class="card-title">{{ __('Vehiculo') }}</h4>
                          <p class="card-category">{{ __('Datos del Vehiculo') }}</p>
                        </div>
                    <div class="card-body ">
                    
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Asignar Cupo') }}</label>
                            <div class="col-sm-7">
                              <div class="input-field">
                                <select name="idParqueadero" type="text" value="" required="true" class="form-control" >
                                  <option value="" disabled selected date-placeholder="cupo">Selecciona Cupo</option>
                                  @foreach ($parqueaderos as $parqueadero)
                                      <option value="{{$parqueadero->id}}">{{$parqueadero->cupo}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        <br>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Placa</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="placa" placeholder="{{ __('Placa') }}"/>
                            </div>
                        </div>
            
                    </div> 

                        <div class="card-footer ml-auto mr-auto">
                             <button type="submit" class="btn btn-primary">Registrar Vehiculo</button>
                        </div> 
                </div>
            </form>

            <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-header card-header-primary">
                            <h4 class="card-title ">Vehiculos</h4>
                            <p class="card-category"> Vehiculos Registrados </p>
                          </div>
                          <div class="card-body">
                     
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <tr>
                                    <th>
                                      ID Cupo
                                      </th>
                                    <th>
                                      Placa Vehiculo
                                    </th>
                                    <th class="text-right">
                                      Acciones
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehiculos as $vehiculo)
                                      <tr>
                                          <td>{{$vehiculo->idParqueadero}}</td>
                                          <td>{{$vehiculo->placa}}</td>
                                          <td class="td-actions text-right">
                                            <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                                              <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-success">Editar</a>
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
            </div> 
        </div> 
    </div> 
</div> 
@endsection