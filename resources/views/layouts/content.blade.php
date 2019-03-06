@extends('master')
@section('content')
<nav class="navigacija navbar flex-row">
    <ul class="navbar navbar-brand flex-row mr-lg-0">
        <a class="login btn btn-item "href="login">Login</a>
        <a class="reg btn btn-item btn-dark" href="register">Register</a>
    </ul>
    <div id="init" class="init justify-content-end text-white" >{{$data['username']}}</div>
</nav>
<div class="container p-0">
    <div class="camera rounded bg-dark text-white "><div id="landing" class="flex row align-content-center justify-content-center w-75">
            @if($data['username'] == 'Svečias')
                <p>Sveiki atvykę į "Face control" projektą</p>
                <p>Tikslas - atpažinti nepageidaujamus žmones pagal jų veidus. Aplikacija lange transliuos kameros vaizdą. Nufotografuotas vaizdas bus palyginamas su nepageidaujamais asmenimis.</p>
                <a href="#" onclick="landing()" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-hand-right">
                    </span> Pirmyn</a></div><img id="loading" class="loading" src="images/load.gif"/></a>
            @endif
            @if($data['username'] != 'Svečias')
                <p>bus kamera, </p>
            @endif
    </div>
</div>
@endsection