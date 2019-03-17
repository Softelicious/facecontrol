<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function auth(Request $request){
        $username = $request['username'];
        $image = DB::table('users')->where('username', $username)->value('user_image');
        $data = [
            'username' => 'Vyr. Apsauginis: ' . $username,
            'filePathSym' => null,
            'filePath' => null,
            'fileName' => null,
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
        ];

        return view('layouts.content')->with('data', $data);
    }
}
