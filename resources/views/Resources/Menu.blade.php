
@auth

@switch( Auth::user()->role )
    @case(1) {{-- Adminsitrador Global --}}
        <a href="{{ url('home') }}">Inicio</a> {{--SAME FOR ALL--}}

        <a href="{{ url('users') }}">Usuarios</a>

        <a href="{{ url('links') }}">Links</a> {{--SAME FOR ALL--}}
        <a href="{{ url('account') }}">Perfil</a> {{--SAME FOR ALL--}}
        <a href=" {{ url('logout') }} ">Cerrar sesion</a> {{--SAME FOR ALL--}}
    @break

    @case(2) {{-- Adminsitrador --}}
        <a href="{{ url('home') }}">Inicio</a> {{--SAME FOR ALL--}}

        <a href="{{ url('users') }}">Usuarios</a>

        <a href="{{ url('links') }}">Links</a> {{--SAME FOR ALL--}}
        <a href="{{ url('account') }}">Perfil</a> {{--SAME FOR ALL--}}
        <a href=" {{ url('logout') }} ">Cerrar sesion</a> {{--SAME FOR ALL--}}
    @break

    @case(3) {{-- Digitador --}}
        <a href="{{ url('home') }}">Inicio</a> {{--SAME FOR ALL--}}

        <a href="{{ url('work-user/'.Auth::user()->id) }}">Trabajos</a>

        <a href="{{ url('links') }}">Links</a> {{--SAME FOR ALL--}}
        <a href="{{ url('account') }}">Perfil</a> {{--SAME FOR ALL--}}
        <a href=" {{ url('logout') }} ">Cerrar sesion</a> {{--SAME FOR ALL--}}
    @break

    @default

@endswitch
@endauth



@guest
    <a href="{{ url('login') }}">Login</a>
    <a href="{{ url('reset-password') }}">Resetear Clave</a>
@endguest



