<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductGalleryModel;
use App\Models\CategoriesModel;
use App\Models\ProductCategoriesModel;
use App\Models\SizeModel;
use App\Http\Requests\ProductRequest;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = ProductModel::orderBy('id','desc')->paginate(10);
        return view('admin.Products.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cate = CategoriesModel::all();
        return view('admin.Products.add', ['cate' => $cate]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
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

        $sp = new ProductModel;
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
                $fe = new ProductGalleryModel();
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
            $ce = new ProductCategoriesModel;
            $ce->idProduct = $id;
            $ce->idCategories = $cate;
            $ce->save();
        }

        foreach ($size as $s => $value) {
            if (!is_null($value)) {
                $se = new SizeModel(); // Tạo một đối tượng mới cho mỗi bản ghi
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
        $pro = ProductModel::find($id);
        $cate = CategoriesModel::all();
        $productcate = ProductCategoriesModel::all();
        $size = SizeModel::where('idProduct', $id)->get();
        $img = ProductGalleryModel::where('idProduct', $id)->get();
        if (is_null($pro)) {
            return redirect('/admin/404');
        }
        return view("admin.Products.edit", ['pro' => $pro, 'cate' => $cate, 'productcate' => $productcate, 'size' => $size, 'img' => $img]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
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

        $sp = ProductModel::find($id);
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
            $urlHinh = 'img/blog/upload/' . $urlname;
            if(!file_exists($urlname)){
                $Img->move(public_path('img/blog/upload'), $urlname);
            }
            $sp->urlHinh = $urlHinh;
        }
        $sp->save();

        if (!is_null($files)) {
                foreach($files as $file){
                    $fe= new ProductGalleryModel;
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
            $matchingRecords = ProductCategoriesModel::where('idProduct', $id)->get();

            foreach ($matchingRecords as $row) {
                    $newIdCateValues[] = $row->idCategories;
            }

            // Check for additional categories
            foreach ($idCate as $row) {
                if (!in_array($row, $newIdCateValues)) {
                    // Insert new record into ProductCategories for the additional category
                    $newRecord = new ProductCategoriesModel();
                    $newRecord->idProduct = $id;
                    $newRecord->idCategories = $row;
                    $newRecord->save();
                }
                else{
                    $ce=ProductCategoriesModel::where('idProduct',$id)->where('idCategories',$row)->first();
                    $ce->idCategories=$row;
                    $ce->save();
                }
            }
            foreach ($newIdCateValues as $row) {
                if (!in_array($row, $idCate)) {
                    ProductCategoriesModel::where('idProduct', $id)->where('idCategories', $row)->delete();
                }
            }
        }

        if (!is_null($size)) {
            $matchingRecords = SizeModel::where('idProduct', $id)->get();

            // Create an array to store the IDs of the matching records
            $matchingSizeIds = [];

            foreach ($matchingRecords as $row) {
                $matchingSizeIds[] = $row->size;
            }

            foreach ($size as $sizeId => $selectedSize) {
                if (!in_array($sizeId, $matchingSizeIds)) {
                    // Insert new record into Sizes for the additional size
                    $newRecord = new SizeModel();
                    $newRecord->idProduct = $id;
                    $newRecord->size = $sizeId;
                    $newRecord->quantity = $selectedSize;
                    $newRecord->save();
                } else {
                    // Update existing record
                    $seToUpdate = SizeModel::where('idProduct', $id)->where('size', $sizeId)->first();
                    if ($seToUpdate) {
                        if($selectedSize==0){
                            SizeModel::where('idProduct', $id)->where('size', $sizeId)->delete();
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
        $pro = ProductModel::find($id);
        if(is_null($pro)){
            return redirect('admin/404');
        }
        if (ProductGalleryModel::where('idProduct', $id)->count() > 0) {
            // Delete records from the ProductGallery table
            ProductGalleryModel::where('idProduct', $id)->delete();

            // Get the URLs of the files associated with the deleted records
            $fileUrls = ProductGalleryModel::where('idProduct', $id)->pluck('urlHinh');

            foreach ($fileUrls as $fileUrl) {
                $filePath = public_path($fileUrl);

                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the physical file on the server
                    // You can perform additional actions here after deleting the file.
                }
            }
        }

        if (SizeModel::where('idProduct', $id)->count() > 0) {
            SizeModel::where('idProduct', $id)->delete();
        }

        if (ProductCategoriesModel::where('idProduct', $id)->count() > 0) {
            ProductCategoriesModel::where('idProduct', $id)->delete();
        }
        $pro->delete();
        $filePath = public_path($pro->urlHinh);
        if (file_exists($filePath)) {
            unlink($filePath); // Xóa tệp vật lý trên máy chủ
            // Sau khi xóa tệp, bạn có thể tiến hành cập nhật hoặc xử lý thông tin trong cơ sở dữ liệu tùy theo yêu cầu.
        }
        return back();
    }
}
