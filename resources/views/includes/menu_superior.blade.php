<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('dashboard') }}">{{ Config::get('app.name') }}</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @guest
                    <!-- li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li   -->
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <!-- li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li -->
                        <li> <a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
                    <!--  li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li -->
                    <li><a href="{{ route('dashboard') }}">Settings</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre href="#">
                            {{ Auth::user()->nombre }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">Mi perfíl</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Configuración</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                { { __('Logout') }}
                            </a  -->

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>