<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductCategories;
use App\Http\Requests\RuleCategories;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cate = Categories::all();
        foreach ($cate as $row) {
            $quantity = ProductCategories::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        return view('Admin.Categories.index', ['cate' => $cate, 'show' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleCategories $request)
    {
        $name = $request->name;
        $slug = $request->slug;
        $cate = new Categories;
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
        $cate = Categories::all();
        foreach ($cate as $row) {
            $quantity = ProductCategories::where('idCategories', $row->id)->count();
            $row->quantity = $quantity;
        }
        $ce = Categories::find($id);
        if(is_null($ce)){
            return redirect('admin/404');
        }
        return view('Admin.Categories.index', ['cate' => $cate, 'show' => false, 'ce' => $ce]);
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(RuleCategories $request, $id)
     {
         $category = Categories::findOrFail($id);
         if(is_null($category)){
            return redirect('admin/404');
         }

         $category->name = $request->name;
         $category->slug = $request->slug;

         // ... Update other attributes

         $category->save();
         return back();
         // Redirect or respond as needed
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::find($id);

        if (is_null($category)) {
            return redirect('admin/404');
        }

        // Delete the category
        $category->delete();

        // Update associated ProductCategories
        ProductCategories::where('idCategories', $id)->update(['idCategories' => 1]);

        return back();
    }

}
