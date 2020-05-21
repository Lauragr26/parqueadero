@extends('layouts.app', ['activePage' => 'clientes'])

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
        <form action="{{route('cliente.store')}} " method="post" autocomplete="off" class="form-horizontal">
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
                  <h4 class="card-title">{{ __('Cliente') }}</h4>
                  <p class="card-category">{{ __('Datos del Cliente') }}</p>
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
                    <label class="col-sm-2 col-form-label">Nombre del Cliente</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" placeholder="{{ __('Nombre del Cliente') }}"  />
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Apellido del Cliente:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="apellido" placeholder="{{ __('Apellido del Cliente') }}"  />
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Telefono:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="telefono" placeholder="{{ __('Telefono') }}"  />
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Número de Documento:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nrodocumento" placeholder="{{ __('Numero de documento') }}"  />
                    </div>
                </div>
            </div>    

                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                </div>
        </div>
      </form>

                        {{-- -----------------------------           --}}
        <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title ">Clientes</h4>
                        <p class="card-category"> Clientes Registrados </p>
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
                                  Nro. Doc.
                                </th>
                                <th>
                                  Nombre
                                </th>
                                <th>
                                  Apellido
                                </th>
                                <th>
                                  Telefono
                                </th>
                                <th class="text-right">
                                  Acciones
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                  <tr>
                                      <td>{{$cliente->idParqueadero}}</td>
                                      <td>{{$cliente->nrodocumento}}</td>
                                      <td>{{$cliente->nombre}}</td>
                                      <td>{{$cliente->apellido}}</td>
                                      <td>{{$cliente->telefono}}</td>
                                      <td class="td-actions text-right">
                                          
                                        <form action="{{route('cliente.destroy', $cliente->id)}}" method="post">
                                          <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-success">Editar</a>
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
@endsection