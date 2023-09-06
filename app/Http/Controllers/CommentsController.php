<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments= CommentsModel::all();
        $user= User::all();
        $pro= Products::all();
        foreach($user as $row){
            foreach($comments as $comment){
                if($comment->idUser==$row->id){
                    $comment->idUser=$row->name;
                }
            }
        };
        foreach($pro as $row){
            foreach($comments as $comment){
                if($comment->idProduct==$row->id){
                    $comment->idProduct=$row->name;
                }
            }
        };
        return view('Admin.Comments.index',['comments'=>$comments]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment= CommentsModel::find($id);
        if(is_null($comment)){
            return view('Admin.404');
        }
        $comment->delete();
        return back();
    }
}
