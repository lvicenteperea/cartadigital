@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> indicamos todos lo errores al principio.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
