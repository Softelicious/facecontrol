<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

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
}
