<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentsProductModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments= CommentsProductModel::where('id','desc')->paginate(10);
        $user= UserModel::all();
        $pro= ProductModel::all();
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
        return view('admin.Comments.index',['comments'=>$comments]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment= CommentsProductModel::find($id);
        if(is_null($comment)){
            return view('admin.404');
        }
        $comment->delete();
        return back();
    }
}
