@extends('layouts.app', ['activePage' => 'cupos'])

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
                <h4 class="card-title">{{ __('Parqueadero') }}</h4>
                <p class="card-category">{{ __('Crear Cupo') }}</p>
              </div>
              <div class="card-body ">
           
                @if (session('regcupo'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('regcupo') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                  <div class="row">
                    <label class="col-sm-2 col-form-label">Cupo</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="cupo" placeholder="{{ __('Cupo') }}"  />
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
                  <h4 class="card-title mt-0">  Parqueadero </h4>
                  <p class="card-category"> Cupos Disponibles </p>
                </div>
                <div class="card-body">

                  @if (session('eliminarcupo'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('eliminarcupo') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">                        
                        <th>
                          Cupo
                        </th>
                        <th class="text-right">
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($parqueaderos as $parqueadero)
                        <tr>
                          <td>{{$parqueadero->cupo}}</td>                          
                          <td class="td-actions text-right">
                            <form action="{{route('parqueadero.destroy', $parqueadero->id)}}" method="post">
                              <a href="{{route('parqueadero.edit', $parqueadero->id)}}" class="btn btn-success">Editar</a>
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