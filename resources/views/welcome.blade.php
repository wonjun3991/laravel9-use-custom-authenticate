<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
</head>
<body class="antialiased">
    <form method="POST" action="{{route('login')}}">
        @csrf
        <input name="email">
        <input name="password">
        <button type="submit">submit</button>
    </form>
    @auth
        <h1>로그인되었습니다.
        {{Auth::user()}}
    @endauth
</body>
</html>
