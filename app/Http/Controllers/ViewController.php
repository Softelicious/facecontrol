<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home(){

        $data = [
            'username' => 'Svečias',
            'image'=> 'noimage.jpg'
        ];
        return view('layouts.content')->with('data', $data);
    }
    public function login(){
        return view('layouts.login');
    }
    public function register(){
        return view('layouts.register');
    }
    public function reminder(){
        return view('layouts.reminder');
    }
}
