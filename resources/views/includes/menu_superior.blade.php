<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ Config::get('app.name') }}</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('dashboard') }}">Settings</a></li>
        <li><a href="{{ route('dashboard') }}">Profile</a></li>
        <li><a href="{{ route('dashboard') }}">Help</a></li>
        </ul>
        <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
        </form>
    </div>
    </div>
</nav>