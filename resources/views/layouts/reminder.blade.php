@extends('master')
@section('content')
    <body class = 'login-body'>
    <div class="container">
        <img src="images/user.png">
        <form>
            <div class="reg-input-password">
                <input type="text" name="username" placeholder="Įveskite el.paštą">
            </div>
            <br>
            <input class="but-submit"  type="submit" name="submit" value="Priminti">

        </form>
    </div>
@endsection