<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductGallery;
use App\Models\Categories;
use App\Models\ProductCategories;
use App\Models\Sizes;
use App\Http\Requests\RuleProduct;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Products::all();
        return view('Admin.Products.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = Categories::all();
        return view('Admin.Products.add', ['cate' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleProduct $request)
    {
        $name = $request->name;
        $price = $request->price;
        $sale = $request->sale;
        $idCate = $request->idcate;
        $quantity = $request->quantity;
        $size = $request->size;
        $files = $request->file('files');
        $Img = $request->file('urlHinh');
        $description = $request->description;
        $i = 2;

        $sp = new Products;
        $sp->name = $name;
        $sp->price = $price;
        $sp->sale = $sale;
        $sp->description = $description;
        $sp->quantity = $quantity;
        $sp->slug=str::slug($name);
        $sp->view = 0;
        $extension = $Img->getClientOriginalExtension();
        $urlname = $name . '.' . $extension;
        $urlHinh = 'img/products/upload/' . $urlname;
        if(!file_exists($urlHinh)){
            $Img->move(public_path('img/products/upload'), $urlname);
        }
        $sp->urlHinh = $urlHinh;
        $sp->save();
        $id = $sp->getKey();

        if (!is_null($files)) {
            foreach ($files as $file) {
                $fe = new ProductGallery();
                $nameproduct = $name . '.' . $i;
                // Di chuyển tệp vào thư mục và đổi tên thành $nameproduct
                if(!file_exists($nameproduct)){
                    $file->move(public_path('img/products/upload'), $nameproduct . '.' . $file->getClientOriginalExtension());
                }
                $fe->urlHinh = 'img/products/upload/' . $nameproduct . '.' . $file->getClientOriginalExtension();
                $fe->name = $nameproduct;
                $fe->idProduct = $id;
                $fe->save();
                $i++;
            }
        }

        foreach ($idCate as $cate) {
            $ce = new ProductCategories;
            $ce->idProduct = $id;
            $ce->idCategories = $cate;
            $ce->save();
        }

        foreach ($size as $s => $value) {
            if (!is_null($value)) {
                $se = new Sizes(); // Tạo một đối tượng mới cho mỗi bản ghi
                $se->idProduct = $id;
                $se->size = $s;
                $se->quantity = $value; // Sử dụng $value thay vì $s->value()
                $se->save();
            }
        }
        return redirect('/admin/product');
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
    public function edit($id)
    {
        $pro = Products::find($id);
        $cate = Categories::all();
        $productcate = ProductCategories::all();
        $size = Sizes::where('idProduct', $id)->get();
        $img = ProductGallery::where('idProduct', $id)->get();
        if (is_null($pro)) {
            return redirect('/admin/404');
        }
        return view("Admin.Products.edit", ['pro' => $pro, 'cate' => $cate, 'productcate' => $productcate, 'size' => $size, 'img' => $img]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleProduct $request, string $id)
    {
        $name = $request->name;
        $price = $request->price;
        $sale = $request->sale;
        $idCate = $request->idcate;
        $quantity = $request->quantity;
        $size = $request->size;
        $files = $request->file('files');
        $Img = $request->file('urlHinh');
        $description = $request->description;
        $view = $request->view;
        $i = 2;

        $sp = Products::find($id);
        if(is_null($sp)){
            return redirect('admin/404');
        }
        $sp->name = $name;
        $sp->price = $price;
        $sp->sale = $sale;
        $sp->description = $description;
        $sp->quantity = $quantity;
        $sp->view = $view;
        $sp->slug=str::slug($name);

        if(!is_null($Img)){
            $extension = $Img->getClientOriginalExtension();
            $urlname = $name . '.' . $extension;
            $urlHinh = 'img/products/upload/' . $urlname;
            if(!file_exists($urlname)){
                $Img->move(public_path('img/products/upload'), $urlname);
            }
            $sp->urlHinh = $urlHinh;
        }
        $sp->save();

        if (!is_null($files)) {
                foreach($files as $file){
                    $fe= new ProductGallery;
                    $nameproduct = $name . '.' . $i;

                    // Move the uploaded file to the destination folder and rename it
                    if(!file_exists($nameproduct)){
                        $file->move(public_path('img/products/upload'), $nameproduct . '.' . $file->getClientOriginalExtension());
                    }
                    // Update the attributes of the record
                    $fe->urlHinh = 'img/products/upload/' . $nameproduct . '.' . $file->getClientOriginalExtension();
                    $fe->name = $nameproduct;
                    $fe->idProduct=$id;
                    $fe->save();

                    $i++;
                }
        }

        if (!is_null($idCate)) {
            $matchingRecords = ProductCategories::where('idProduct', $id)->get();

            foreach ($matchingRecords as $row) {
                    $newIdCateValues[] = $row->idCategories;
            }

            // Check for additional categories
            foreach ($idCate as $row) {
                if (!in_array($row, $newIdCateValues)) {
                    // Insert new record into ProductCategories for the additional category
                    $newRecord = new ProductCategories();
                    $newRecord->idProduct = $id;
                    $newRecord->idCategories = $row;
                    $newRecord->save();
                }
                else{
                    $ce=ProductCategories::where('idProduct',$id)->where('idCategories',$row)->first();
                    $ce->idCategories=$row;
                    $ce->save();
                }
            }
            foreach ($newIdCateValues as $row) {
                if (!in_array($row, $idCate)) {
                    ProductCategories::where('idProduct', $id)->where('idCategories', $row)->delete();
                }
            }
        }

        if (!is_null($size)) {
            $matchingRecords = Sizes::where('idProduct', $id)->get();

            // Create an array to store the IDs of the matching records
            $matchingSizeIds = [];

            foreach ($matchingRecords as $row) {
                $matchingSizeIds[] = $row->size;
            }

            foreach ($size as $sizeId => $selectedSize) {
                if (!in_array($sizeId, $matchingSizeIds)) {
                    // Insert new record into Sizes for the additional size
                    $newRecord = new Sizes();
                    $newRecord->idProduct = $id;
                    $newRecord->size = $sizeId;
                    $newRecord->quantity = $selectedSize;
                    $newRecord->save();
                } else {
                    // Update existing record
                    $seToUpdate = Sizes::where('idProduct', $id)->where('size', $sizeId)->first();
                    if ($seToUpdate) {
                        if($selectedSize==0){
                            Sizes::where('idProduct', $id)->where('size', $sizeId)->delete();
                        }
                        else{
                            $seToUpdate->quantity = $selectedSize;
                            $seToUpdate->save();
                        }
                    }
                }
            }
        }
        return redirect('/admin/product');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pro = Products::find($id);
        if(is_null($pro)){
            return redirect('admin/404');
        }
        if (ProductGallery::where('idProduct', $id)->count() > 0) {
            // Delete records from the ProductGallery table
            ProductGallery::where('idProduct', $id)->delete();

            // Get the URLs of the files associated with the deleted records
            $fileUrls = ProductGallery::where('idProduct', $id)->pluck('urlHinh');

            foreach ($fileUrls as $fileUrl) {
                $filePath = public_path($fileUrl);

                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the physical file on the server
                    // You can perform additional actions here after deleting the file.
                }
            }
        }


        if (Sizes::where('idProduct', $id)->count() > 0) {
            Sizes::where('idProduct', $id)->delete();
        }

        if (ProductCategories::where('idProduct', $id)->count() > 0) {
            ProductCategories::where('idProduct', $id)->delete();
        }
        $pro->delete();
        $filePath = public_path($pro->urlHinh);
        if (file_exists($filePath)) {
            unlink($filePath); // Xóa tệp vật lý trên máy chủ
            // Sau khi xóa tệp, bạn có thể tiến hành cập nhật hoặc xử lý thông tin trong cơ sở dữ liệu tùy theo yêu cầu.
        }
        return redirect('/admin/product');
    }
}
