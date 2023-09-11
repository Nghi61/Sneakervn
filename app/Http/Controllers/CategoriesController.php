<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Models\CategoriesModel;
use App\Models\ProductCategoriesModel;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = CategoriesModel::all();
        foreach ($cate as $row) {
            $quantity = ProductCategoriesModel::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        return view('admin.Categories.index', ['cate' => $cate, 'show' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $name = $request->name;
        $slug = $request->slug;
        $cate = new CategoriesModel;
        $cate->name = $name;
        if (is_null($slug)) {
            $cate->slug = Str::slug($name);
        } else {
            $cate->slug = $slug;
        }
        $cate->save();
        return redirect('admin/categories');
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
        $cate = CategoriesModel::all();
        foreach ($cate as $row) {
            $quantity = ProductCategoriesModel::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        $ce = CategoriesModel::find($id);
        if(is_null($ce)){
            return view('admin.404');
        }
        return view('admin.Categories.index', ['cate' => $cate, 'show' => false, 'ce' => $ce]);
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(CategoriesRequest $request, $id)
     {
         $category = CategoriesModel::findOrFail($id);
         if(is_null($category)){
            return view('admin.404');
         }

         $category->name = $request->name;
         $category->slug = $request->slug;

         $category->save();
         return back();
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = CategoriesModel::find($id);

        if (is_null($category)) {
            return view('admin.404');
        }

        // Delete the category
        $category->delete();

        // Update associated ProductCategories
        ProductCategoriesModel::where('idCategories', $id)->update(['idCategories' => 1]);

        return back();
    }
    public function deleteCate(Request $request)
    {
        // Lấy danh sách các ô kiểm đã được chọn từ yêu cầu
        $checkboxes = $request->input('checkboxes');

        // Xóa dữ liệu của các dòng tương ứng với các ô kiểm đã chọn
        foreach ($checkboxes as $checkbox) {
            // Xóa dữ liệu từ bảng tương ứng
            // Ví dụ: sử dụng Eloquent ORM để xóa dữ liệu từ bảng "Tin" dựa trên giá trị "id"
            CategoriesModel::where('id', $checkbox)->delete();
        }

        // Điều hướng trở lại trang trước
        return back();
    }

}
