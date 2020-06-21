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
                    $menu    = new \App\Modelos\HXXI\Hxxi_Menu();
                    $menuAll = $menu->estatico();
                ?>

                <p>
                @foreach($menuAll as $item)
                    {{ $item['id'] }} - {{ $item['padre'] }} - {{ $item['tipo'] }} - {{ $item['label'] }} - {{ $item['link'] }} <br/>
                @endforeach
                </p>
                <p>- 'id'=>'1', 'padre'=>'1', 'label'=>'Opción 1'</p>
                <p>- 'id'=>'2', 'padre'=>'2', 'label'=>'submenú 2'</p>
                <p>---- 'id'=>'3', 'padre'=>'2', 'label'=>'submenú 2.1'</p>
                <p>-------- 'id'=>'4', 'padre'=>'3', 'label'=>'Opción 4-  2.1.1'</p>
                <p>---- 'id'=>'5', 'padre'=>'2', 'label'=>'Opción 5 - 2.2'</p>
                <p>- 'id'=>'6', 'padre'=>'6', 'label'=>'Opción 6'</p>
            </div>
        </div>
    </div>
</div>
@endsection
