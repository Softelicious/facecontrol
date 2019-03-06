@extends('master')
@section('content')
    <body class = 'login-body'>
    <div class="container">
        <img src="images/user.png">
        <form method="POST" action="{{URL::to('/login/auth')}}">

            <div class="reg-input">
                <input type="text" name="username" placeholder="Įveskite vardą">
            </div>

            <div class="reg-input">
                <input type="password" name="password" placeholder="Įveskite slaptažodį">
            </div>

            @csrf
            <input class="but-submit"  type="submit" name="submit" value="Prisijungti">
            <br>
            <a href="reminder"> Pamiršau slaptažodį</a>

        </form>
    </div>
@endsection