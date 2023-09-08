<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=UserModel::where('id','desc')->paginate(10);
        foreach($user as $row){
            if( $row->role==0){
                $row->role='Quản lý';
            }
            else{
                $row->role='Người dùng';
            }

        }
        return view('admin.User.index',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $name = $request->name;
        $emai = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $gender = $request->gender;
        $date = $request->date;
        $avatar = $request->file('avatar');
        $role = $request->role;

        $user = new UserModel;
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
        $user=UserModel::find($id);
        if(is_null($user)){
            return view('admin.404');
        }
        return view('admin.User.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = UserModel::find($id);
        if(is_null($user)){
            return view('admin.404');
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
        $user= UserModel::find($id);
        if(is_null($user)){
            return view('admin.404');
        }
        $user->delete();
        return back();
    }
}
