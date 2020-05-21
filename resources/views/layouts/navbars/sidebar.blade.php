<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('App name') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Menú Principal') }}</p>
        </a>
      </li>
      
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#usuario" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/icono-usuario.svg"></i>
          <p>{{ __('Administrar Usuario') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="usuario">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> PU </span>
                <span class="sidebar-normal">{{ __('Perfil de Usuario') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> GU </span>
                <span class="sidebar-normal"> {{ __('Gestión de Usuarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
            <li class="nav-item{{ $activePage == 'cupos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('parqueadero.index') }}">
                <i class="material-icons">library_books</i>
                  <p>{{ __('Cupos') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'clientes' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('cliente.index') }}">
                <i class="material-icons">face</i>
                <p>{{ __('Clientes') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'vehiculos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('vehiculo.index') }}">
                <i class="material-icons">directions_car</i>
                <p>{{ __('Vehiculos') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'entradas' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('detalle.index') }}">
                <i class="material-icons">event</i>
                <p>{{ __('Detalles') }}</p>
              </a>
            </li>
    </ul>
  </div>
</div>