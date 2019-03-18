<?php

namespace App\Http\Controllers;

use App\User;
use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'email' => 'required',
            'user_image' => 'image|required'
        ]);

        $fileNameAndExtention = $request->file('user_image')->getClientOriginalName();
        $fileName = pathinfo($fileNameAndExtention, PATHINFO_FILENAME);
        $fileExtention = $request->file('user_image')->getClientOriginalExtension();
        $fileNameToStore = $fileName."_".time().".".$fileExtention;
        $path = $request->file('user_image')->storeAs('public/users_images', $fileNameToStore);

        $user = new User();
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);
        $user->email= $request['email'];
        $user->user_image= $fileNameToStore;
        $user->save();
        return redirect('/login');
    }

    public function login(Request $request){
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
