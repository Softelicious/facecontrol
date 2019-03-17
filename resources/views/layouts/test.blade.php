@extends('master')
@section('content')
    <nav class="navigacija navbar flex-row">
        <ul class="navbar navbar-brand flex-row mr-lg-0">
            <a class="login btn btn-item "href="login">Login</a>
            <a class="reg btn btn-item btn-dark" href="register">Register</a>
        </ul>
        <div id="init" class="init justify-content-center text-white" >Naktinis klubas: <i>neparduota</i></div>
        <div id="init" class="init justify-content-end text-white" >Apsauginis: Foxtrot</div>
    </nav>
    <div class="container p-0">
        <div class="camera rounded bg-dark text-white ">
            <div id="landing" class="flex row align-content-center justify-content-center w-75">
                <video id="vid" >video</video>
                    <a href="{{URL::to('/check/blacklist')}}" type="button" class="photo-check btn btn-primary mb-3" value="">Tikrinti</a>
                    <div class = "control-panel">
                        <ul class="photo d-flex flex-row bd-highlight">
                            <a href="{{URL::to('/add_to/blacklist')}}" type="button" class="p-2 bd-highlight btn btn-danger mr-3" value="">Į juodąjį sąrašą</a><br>
                            <a href="{{URL::to('/delete_from/blacklist')}}" type="button" class="p-2 bd-highlight btn btn-success mr-3" value="">Iš juodojo sąrašo</a>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
@endsection