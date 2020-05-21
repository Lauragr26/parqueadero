@extends('layouts.app', ['activePage' => 'clientes'])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('cliente.update', $cliente->id)}}" autocomplete="off" class="form-horizontal" method="post">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Cliente') }}</h4>
                <p class="card-category">{{ __('Modificar Cliente') }}</p>
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
                          <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}"  />
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Apellido del Cliente:</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="apellido" value="{{$cliente->apellido}}"  />
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Telefono:</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}"  />
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">Número de Documento:</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" name="nrodocumento"  value="{{$cliente->nrodocumento}}" />
                      </div>
                  </div>

            </div>

            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
