<form action="{{route('password.passwordEmail')}}" method="post">
    @csrf
    @php
        if (!isset($token)) {
            $token = \Request::route('token');
        }@endphp

    <input type="hidden" name="token" value="{{ $token }}">
    <input type="text" name='password'>
    <input type="text">
    <button>submit</button>
</form>