@extends('master')
@section('content')
    <body class = 'login-body'>
    <div class="container">
        <img src="images/user.png">
        <form action="{{URL::to('/')}}" method="post">
            <div class="card border-secondary ml-auto mr-auto mb-3" style="max-width: 19rem;">Įveskite el.paštą, jei norite tapti apsauginiu</div>
            <div class="reg-input-password">

                <input type="text" name="username" placeholder="Įveskite el.paštą">
            </div>
            <br>
            <input class="but-submit"  type="submit" name="submit" value="Priminti">

        </form>
    </div>
@endsection