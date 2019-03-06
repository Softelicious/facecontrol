@extends('master')
@section('content')
    <?php $fileform = "Įkelti savo nuotrauką"?>
    <body class = 'login-body'>
    <div class="container">
        <img src="images/user.png">
        <form  class = "md-form" action="{{URL::to('/users')}}" method = "post" enctype="multipart/form-data" class="dropzone" id="dropzone">

            <div class="reg-input">
                <input type="text" name="username" placeholder="Įveskite vardą">
            </div>

            <div class="reg-input">
                <input type="password" name="password" placeholder="Įveskite slaptažodį">
            </div>

            <div class="reg-input">
                <input type="password" name="password_confirmation" placeholder="Pakartokite slaptažodį">
            </div>

            <div class="reg-input">
                <input type="text" name="email" placeholder="Įveskite el.paštą">
            </div>
            <div class="reg-input">

                <label id = "fileStatus" for="form-file" >Įkelkite nuotrauką</label>
                <input type="file" name="user_image" class="form-file" id="form-file" style="display: none" >
            </div>





            @csrf
            <input class="but-submit"  type="submit" name="submit" value="Registruotis">
            <br>
            <a class = 'login-redirect' href="login"> Prisijungti</a>

        </form>
    </div>
@endsection
