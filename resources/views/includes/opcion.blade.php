{{--@if ($opcion['submenu'] == []) --}}
@if ($opcion['submenu'] == [])
    <li class="{{ ! Route::is($opcion['link']) ?: 'active' }}"><a href="{{ route($opcion['link']) }}">{{ $opcion['label'] }}</span></a></li>
@else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $opcion['label'] }} <span class="caret"></span></a>
            <ul class="dropdown-menu sub-menu">
                @foreach ($opcion['submenu'] as $menu)
                    @if ($menu['submenu'] == [])
                        <li class="{{ ! Route::is($menu['link']) ?: 'active' }}"><a href="{{ route($menu['link']) }}">{{ $menu['label'] }}</span></a></li>
                    @else
                            @include('includes.opcion', [ 'opcion' => $menu ])
                    @endif
                @endforeach
            </ul>
        </li>
@endif
