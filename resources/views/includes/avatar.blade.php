@if(Auth::user()->imagen)
    <div class="container-avatar">
        <img src="{{ route('user.avatar', ['NombFic' => Auth::user()->imagen] ) }}" class="avatar" />
    </div>
@endif
