<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=BlogModel::orderBy('id','desc')->paginate(10);
        $users = UserModel::all()->keyBy('id');

        // Duyệt qua danh sách bài viết và thực hiện cập nhật thông tin người dùng và số lượng bình luận
        foreach($blogs as $blog){
            if(isset($users[$blog->idUser])){
                $blog->userName = $users[$blog->idUser]->name;
            }
        }

        return view('admin.Blog.index',['blog'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $title=$request->title;
        $img=$request->file('urlHinh');
        $content=$request->content;
        $id=$request->id;
        $blog=new BlogModel;
        $blog->idUser=$id;
        $blog->title=$title;
        $blog->content=$content;
        $blog->slug=str::slug($title);
        $blog->view = 0;
        $extension = $img->getClientOriginalExtension();
        $urlname = str::slug($title) . '.' . $extension;
        $urlHinh = 'img/blog/upload/' . $urlname;
        if(!file_exists($urlHinh)){
            $img->move(public_path('img/blog/upload'), $urlname);
        }
        $blog->urlHinh = $urlHinh;
        $blog->save();
        return redirect('admin/blog');
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
        $pro=BlogModel::find($id);
        if(is_null($pro)){
            return view('admin.404');
        }
        return view('admin.Blog.edit',['pro'=>$pro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        $blog=BlogModel::find($id);
        if(is_null($blog)){
            return view('admin.404');
        }
        $title=$request->title;
        $img=$request->file('urlHinh');
        $content=$request->content;
        $id=$request->id;
        $view=$request->view;

        $blog->idUser=$id;
        $blog->title=$title;
        if(!is_null($content)){
            $blog->content=$content;
        }
        $blog->slug=str::slug($title);
        $blog->$view;

        if(!is_null($img)){
            $extension = $img->getClientOriginalExtension();
            $urlname = str::slug($title) . '.' . $extension;
            $urlHinh = 'img/products/upload/' . $urlname;
            if(!file_exists($urlname)){
                $img->move(public_path('img/products/upload'), $urlname);
            }
            $blog->urlHinh = $urlHinh;
        }
        $blog->save();
        return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=BlogModel::find($id);
        if(is_null($blog)){
            return view('admin.404');
        }
        $blog->delete();
        return back();
    }
}
