@extends('master')
@section('content')
<nav class="navigacija navbar flex-row">
    <ul class="navbar navbar-brand flex-row mr-lg-0">
        @if($data['username']== 'Apsauginis' || $data['username']=='Svečias')
            <a class="login btn btn-item "href="{{URL::to('/login')}}">
            Login
            </a>
        @endif
        @if($data['username']!= 'Apsauginis' && $data['username']!='Svečias')
            <a class="login btn btn-item "href="{{URL::to('/')}}">
                Logout
            </a>
         @endif
        <a class="reg btn btn-item btn-dark" href="{{URL::to('/register')}}">Register</a>
    </ul>
    <div id="init" class="init justify-content-center text-white" >Naktinis klubas: <i> Trademark&trade; </i></div>
    <div id="init" class="init justify-content-end text-white" >{{$data['username']}}</div>
</nav>


<div class="container dom-container">
    <div class="camera rounded bg-dark text-white d-inline-block">
            @if($data['username'] == 'Svečias')
                <div class="position-relative w-75 mx-auto p-5">
                <p>Sveiki atvykę į "Facecontrol" projektą</p>
                <p>Tikslas - atpažinti nepageidaujamus žmones pagal jų veidus. Aplikacija lange transliuos kameros vaizdą. Nufotografuotas vaizdas bus palyginamas su nepageidaujamais asmenimis.</p>
                <a href="{{URL::to('/home')}}" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-hand-right"></span> Pirmyn</a>
                </div>
            @endif
                @if($data['username'] != 'Svečias')
                    <div id="vidd" >Laukiamas leidimas naudoti kamerą</div>
                    <video id="vid" class="clearfix float-left" width="65%">video</video>
                    <form method="post" action="{{URL::to('/check')}}" id="myForm" class="mt-4">
                        <input type="submit" class="buttonSubmit btn btn-primary ml-3" id="button-check" value="Tikrinti"/>
                        <input type="hidden" value="" name="path" id="path"/>
                        <input type="hidden" value="{{$data['username']}}" name="username" id="username"/>
                        @csrf
                    </form>
                    @if($data['username']!= 'Apsauginis')
                        @if($data['message']== "Vartotojas neatpažintas juodajame sąraše. Įtrauk į juodąjį sąrašą jei jis tau nepatinka")
                            <form action="{{URL::to('/add')}}" method="post" class="mt-lg-5 mt-md-0" id="myForm2">
                                <input type="hidden" value="{{$data['username']}}" name="username" id="username"/>
                                <input type="hidden" value="{{$data['filePath']}}" name="filePath" id="filePath"/>
                                <input type="hidden" value="{{$data['filePathSym']}}" name="filePathSym" id="filePathSym"/>
                                <input type="hidden" value="{{$data['fileName']}}" name="fileName" id="fileName"/>
                                <input type="submit" class="buttonSubmit btn btn-danger ml-3" value="Į juodąjį sąrašą"><br>
                                @csrf
                            </form>
                        @endif
                        @if($data['message']== "Vartotojas yra atpažintas juodajame sąraše - NEPRALEISTI, nebent sumoka")
                                <form action="{{URL::to('/delete')}}" method="post" class="mt-lg-5 mt-md-0" id="myForm3">
                                    <input type="hidden" value="{{$data['username']}}" name="username" id="username" />
                                    <input type="hidden" value="{{$data['filePath']}}" name="filePath" id="filePath"/>
                                    <input type="hidden" value="{{$data['filePathSym']}}" name="filePathSym" id="filePathSym"/>
                                    <input type="hidden" value="{{$data['fileName']}}" name="fileName" id="fileName"/>
                                    <input type="submit" class="buttonSubmit btn btn-success ml-3" value="Iš juodojo sąrašo">
                                    @csrf
                                </form>
                            @endif
                    @endif
                    <canvas id = "canvas" class ="d-none" width="735" height="550"></canvas>
                    <img id="img-check"  class="d-none" width="735" height="550"/>
                    <div id = "user-info" class = "mr-3 mt-5 user-info">
                        @if($data['username']== 'Apsauginis' || $data['username']=='Svečias')
                                {{$data['message2']}}
                        @endif
                        @if($data['username']!= 'Apsauginis' && $data['username']!='Svečias')
                                {{$data['message']}}
                        @endif
                    </div>
                @endif
    </div>
</div>

@endsection