<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Jsonable;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$users = User::all();
        // $users = User::all();
        // foreach($users as $user){
        //     if(strlen($user->password) != 60){
        //         $user->password = Hash::make($user->password);
        //         $user->save();
        //     }
        // }   
        $users = User::orderBy('name','asc')->paginate(5);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return view('user.index');
        $user = new User();
        $password = Hash::make($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkUserPassword($id,$password){
        $user = User::findOrFail($id);
        $password1 = Hash::make($password);
        if(Hash::check($password,$user->password) == false) echo 'false';
        else echo 'true';
        echo '  password: '.$password1;
        echo '<br>';
        return 'password: '.$user->password;
    }
    public function show($id)
    {
        //
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
        $user = User::findOrFail($id);
        return view('user.update',compact('user'));
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
        //start update user
        $getUser = User::findOrFail($id);
        if($request->password != '')
            $getUser->password = Hash::make($request->password);
        else $getUser->password = $getUser->password;
        $getUser->name = $request->name;
        $getUser->email = $request->email;
        $getUser->save();
        return redirect(route('user.index'));
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
        $user = User::destroy($id);
        return redirect(route('user.index'));
    }
    private function setting(){
        
    }
}
