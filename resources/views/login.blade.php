<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="card">
    <h1>LOGIN</h1>
    <form method="POST" action="/login">
        @csrf
        <input name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button>LOGIN</button>
    </form>
</div>
