<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){

        $data = [
            'username' => 'Svečias',
            'filePath' => null,
            'fileName' => null,
            'filePathSym' => null,
            'message2' => "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją",
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
        ];
        return view('layouts.content')->with('data', $data);
    }

    public function home(){

        $data = [
            'username' => 'Apsauginis',
            'filePath' => null,
            'fileName' => null,
            'filePathSym' => null,
            'message2' => "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją",
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
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
    public function security(){
        return view('layouts.security');
    }
    public function test(){
        return view('layouts.test');
    }
}
