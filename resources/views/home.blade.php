@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Esto es la Home</h1>
                        <?php echo '-'. preg_match('/^[A-Za-z\d$@$!%*?&]{8,15}/', 'Holaw ewrewr') .'-'; ?>          </div>

                <?php
                    $menu = new \App\Modelos\HXXI\Hxxi_Menu();
                    $menuAll = $menu->estatico();
                ?>

                <p>
                @foreach($menuAll as $item)
                    {{ $item['id'] }} - {{ $item['padre'] }} - {{ $item['tipo'] }} - {{ $item['label'] }} - {{ $item['link'] }} <br/>
                @endforeach
                </p>
                <p>
                1 - 1 - opcion - Opción 1 - http://link1.com <br/>
                2 - 2 - opcion - submenú 2 - <br/>
                3 - 2 - submenu - submenú 2.1 - <br/>
                4 - 3 - submenu - Opción 4- 2.1.1 - http://link2.1.com <br/>
                5 - 2 - submenu - Opción 5 - 2.2 - http://link2.2.com <br/>
                6 - 6 - opcion - Opción 6 - http://link5.com <br/>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
