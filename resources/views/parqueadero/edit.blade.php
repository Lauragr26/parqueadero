@extends('layouts.app', ['activePage' => 'cupos'])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('parqueadero.update', $parqueadero->id)}}" autocomplete="off" class="form-horizontal" method="post">
            @csrf
            @method('PUT')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Cupo') }}</h4>
                <p class="card-category">{{ __('Modificar Cupo') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">Cupo</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" name="cupo" value="{{$parqueadero->cupo}}"  />
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
