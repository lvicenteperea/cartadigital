<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        @auth
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.aplicaciones.index', 'label'=>'Aplicaciones']])
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.dispositivos.index', 'label'=>'Dispositivos']])
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.idiomas.index', 'label'=>'Idiomas']])
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.textos.index', 'label'=>'Textos']])
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.txt_idiomas.index', 'label'=>'Textos Idiomas']])
            @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'hxxi.menus.index', 'label'=>'Menú']])
        @endauth

        @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'dashboard', 'label'=>'Analytics']])
        @include('includes.opcion', ['opcion' => ['submenu'=>[], 'link'=>'dashboard', 'label'=>'Export']])
    </ul>

    {{--
    @if(isset($menus))
        @foreach($menus as $opcion)
            @if ($opcion['parent'] != 0)
                @break
            @endif
            @include('includes.opcion', ['opcion' => $opcion])
        @endforeach
    @endif
    --}}



    <ul class="nav nav-sidebar">
        @include('includes.opcion', ['opcion' => ['submenu'=>[['submenu'=>[], 'link'=>'dashboard', 'label'=>'Nav item again'],
                                                              ['submenu'=>[], 'link'=>'dashboard', 'label'=>'One more nav'],
                                                              ['submenu'=>[['submenu'=>[], 'link'=>'dashboard', 'label'=>'Sub 1 de One more nav'],
                                                                           ['submenu'=>[], 'link'=>'dashboard', 'label'=>'Sub 2 de One more nav'],
                                                                          ]
                                                              ,'link'=>'dashboard'
                                                              ,'label'=>'Another nav item'],
                                                              ['submenu'=>[], 'link'=>'dashboard', 'label'=>'More navigation'],
                                                             ]
                                                 ,'link'=>'dashboard'
                                                 ,'label'=>'Nav items']])
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('dashboard') }}">Nav item again</a></li>
        <li><a href="{{ route('dashboard') }}">One more nav</a></li>
        <li><a href="{{ route('dashboard') }}">Another nav item</a></li>
    </ul>
</div>
