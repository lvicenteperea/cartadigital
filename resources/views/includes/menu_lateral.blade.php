<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <!-- li class="active"><a href="{ { route('hxxi.aplicaciones.index') }}">Aplicaciones<span class="sr-only">(current)</span></a></li -->
        @auth
            <li class="{{ ! Route::is('hxxi.aplicaciones.index') ?: 'active' }}"><a href="{{ route('hxxi.aplicaciones.index') }}">Aplicaciones</span></a></li>
            <li class="{{ ! Route::is('hxxi.dispositivos.index') ?: 'active' }}"><a href="{{ route('hxxi.dispositivos.index') }}">Dispositivos</a></li>
            <li class="{{ ! Route::is('hxxi.idiomas.index') ?: 'active' }}"><a href="{{ route('hxxi.idiomas.index') }}">Idiomas</a></li>
            <li class="{{ ! Route::is('hxxi.textos.index') ?: 'active' }}"><a href="{{ route('hxxi.textos.index') }}">Textos</a></li>
            <li class="{{ ! Route::is('hxxi.txt_idiomas.index') ?: 'active' }}"><a href="{{ route('hxxi.txt_idiomas.index') }}">Textos Idiomas</a></li>
        @endauth
        <li><a href="{{ route('dashboard') }}">Analytics</a></li>
        <li><a href="{{ route('dashboard') }}">Export</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('dashboard') }}">Nav item</a></li>
        <li><a href="{{ route('dashboard') }}">Nav item again</a></li>
        <li><a href="{{ route('dashboard') }}">One more nav</a></li>
        <li><a href="{{ route('dashboard') }}">Another nav item</a></li>
        <li><a href="{{ route('dashboard') }}">More navigation</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('dashboard') }}">Nav item again</a></li>
        <li><a href="{{ route('dashboard') }}">One more nav</a></li>
        <li><a href="{{ route('dashboard') }}">Another nav item</a></li>
    </ul>
</div>
