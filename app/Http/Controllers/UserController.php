<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleUser;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        foreach($user as $row){
            if( $row->role==0){
                $row->role='Quản lý';
            }
            else{
                $row->role='Người dùng';
            }

        }
        return view('Admin.User.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleUser $request)
    {
        $name = $request->name;
        $emai = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $gender = $request->gender;
        $date = $request->date;
        $avatar = $request->file('avatar');
        $role = $request->role;

        $user = new user;
        $user->name = $name;
        $user->email = $emai;
        $user->phone= $phone;
        $user->password = $password;
        $user->gender = $gender;
        $user->birthday=$date;
        $user->role = $role;
        if(!is_null($avatar)){
            $extension = $avatar->getClientOriginalExtension();
            $urlname = $name . '.' . $extension;
            $urlHinh = 'img/avatar/' . $urlname;
            if(!file_exists($urlHinh)){
                $avatar->move(public_path('img/avatar/'), $urlname);
            }
            $user->avatar = $urlHinh;
        }
        $user->save();
        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        if(is_null($user)){
            return view('Admin.404');
        }
        return view('Admin.User.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleUser $request, string $id)
    {
        $user = user::find($id);
        if(is_null($user)){
            return view('Admin.404');
        }
        $name=$request->name;
        $avatar=$request->file('avatar');
        $password=$request->password;
        $user->name=$name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->gender=$request->gender;
        $user->birthday=$request->date;
        $user->role=$request->role;
        if(!is_null($avatar)){
            $extension = $avatar->getClientOriginalExtension();
            $urlname = $name . '.' . $extension;
            $urlHinh = 'img/avatar/' . $urlname;
            if(!file_exists($urlHinh)){
                $avatar->move(public_path('img/avatar/'), $urlname);
            }
            $user->avatar = $urlHinh;
        }
        if(!is_null($password)){
            $user->password=$password;
        }
        $user->save();
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
