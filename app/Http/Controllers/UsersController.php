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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return 55;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {
        return 123;
    }
    public function checkBlacklist(Request $request)
    {
        //$username = $request['username'];
        //$image = DB::table('users')->where('username', $username)->value('user_image');
        $data = [
            'username' => 'Apsauginis',
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
        ];

        return view('layouts.content')->with('data', $data);//
    }
    public function addToBlacklist(Request $request)
    {
        $this->validate($request, [
            'filePath' => 'nullable',
            'fileName' => 'nullable',
            'filePathSym' => 'nullable',
            'username' => 'required'
        ]);
        $fileName = $request['fileName'];

        Storage::disk('local')->move($request['filePath'], "public/blacklist/$fileName");
        $recognition = new Recognition();
        $recognition->path = $request['filePathSym'];
        $recognition->name = $fileName;
        $recognition->save();

        $data = [
            'username' => $request['username'],
            'filePath' => null,
            'fileName' => null,
            'filePathSym' => null,
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
        ];

        return view('layouts.content')->with('data', $data);//
    }
    public function removeFromBlacklist(Request $request)
    {
        $this->validate($request, [
            'filePath' => 'nullable',
            'fileName' => 'nullable',
            'filePathSym' => 'nullable',
            'username' => 'required'
        ]);
        $fileName = $request['fileName'];

        DB::table('recognition')->where('path', $request['filePathSym'])->delete();
        Storage::disk('local')->delete($request['filePath']);
        Storage::deleteDirectory("public/temp");
        Storage::makeDirectory("public/temp");

        $data = [
            'username' => $request['username'],
            'path' => null,
            'fileName' => null,
            'filePathSym' => null,
            'message'=> "Spausk 'Tikrinti', kad sužinotum ar praleisti lankytoją"
        ];

        return view('layouts.content')->with('data', $data);
    }
}
