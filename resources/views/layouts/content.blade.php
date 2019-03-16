@extends('master')
@section('content')
<nav class="navigacija navbar flex-row">
    <ul class="navbar navbar-brand flex-row mr-lg-0">
        <a class="login btn btn-item "href="{{URL::to('/login')}}">Login</a>
        <a class="reg btn btn-item btn-dark" href="{{URL::to('/register')}}">Register</a>
    </ul>
    <div id="init" class="init justify-content-center text-white" >Naktinis klubas: <i>neparduotas</i></div>
    <div id="init" class="init justify-content-end text-white" >{{$data['username']}}</div>
</nav>


<div class="container p-0">
    <div class="camera rounded bg-dark text-white ">
        <div id="landing">
            @if($data['username'] == 'Svečias')
                <div style="position: absolute; left: 10%; top: 20%;">
                <p>Sveiki atvykę į "Face control" projektą</p>
                <p>Tikslas - atpažinti nepageidaujamus žmones pagal jų veidus. Aplikacija lange transliuos kameros vaizdą. Nufotografuotas vaizdas bus palyginamas su nepageidaujamais asmenimis.</p>
                <a href="{{URL::to('/home')}}" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-hand-right"></span> Pirmyn</a>
                </div>
            @endif
            @if($data['username'] != 'Svečias')
                <div id="vidd" >Laukiamas leidimas naudoti kamerą</div>
                    <video id="vid"  width="735" height="550">video</video>
                <form method="post" action="{{URL::to('/checkDatabaseForMatch')}}" id="myForm">
                    <input type="submit" class="d-block photo-check btn btn-primary mt-3 mr-1 p-2" id="button-check"/>
                    @if($data['username']!= 'Susipažinęs svečias')
                        <div class = "control-panel">
                            <ul class="photo  bd-highlight">
                                <a href="{{URL::to('/add_to/blacklist')}}" type="button" class="p-2 bd-highlight btn btn-danger mr-1  mt-3" value="">Į juodąjį sąrašą</a><br>
                                <a href="{{URL::to('/delete_from/blacklist')}}" type="button" class="p-2 bd-highlight btn btn-success mr-1 mt-3" value="">Iš juodojo sąrašo</a>
                            </ul>
                        </div>
                    @endif
                    <input type="hidden" value="" name="path" id="path"/>
                    @csrf
                </form>
                    <canvas id = "canvas" class="d-none" width="735" height="550"></canvas>
                    <img id="img-check"  class="d-none" width="735" height="550"/>
                    <div id = "user-info" class = "user-info">Spauskite "Tikrinti", tam, kad sužinotumėte, ar galite šiandien apsilankyti klube</div>
            @endif
                <img src="{{asset('images/domis.jpg')}}" alt="" id="myImg1"><br/>
                <img src="{{asset('images/domis.jpg')}}" alt="" id="myImg2">
         </div>
    </div>
</div>

@endsection