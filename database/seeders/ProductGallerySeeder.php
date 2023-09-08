<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductGalleryModel;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductGalleryModel::create([
            'name'=>'Giày Reponse CL - ảnh 2',
            'urlHinh'=>'img/products/Giày Reponse CL/2.jpg',
            'idProduct'=>'1',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Reponse CL - ảnh 3',
            'urlHinh'=>'img/products/Giày Reponse CL/3.jpg',
            'idProduct'=>'1',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Reponse CL - ảnh 4',
            'urlHinh'=>'img/products/Giày Reponse CL/4.jpg',
            'idProduct'=>'1',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Hanball Spezial - ảnh 2',
            'urlHinh'=>'img/products/Giày Hanball Spezial/2.jpg',
            'idProduct'=>'2',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Hanball Spezial - ảnh 3',
            'urlHinh'=>'img/products/Giày Hanball Spezial/3.jpg',
            'idProduct'=>'2',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Hanball Spezial - ảnh 4',
            'urlHinh'=>'img/products/Giày Hanball Spezial/4.jpg',
            'idProduct'=>'2',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Supertar XLG - ảnh 2',
            'urlHinh'=>'img/products/Giày Supertar XLG/2.jpg',
            'idProduct'=>'3',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Supertar XLG - ảnh 3',
            'urlHinh'=>'img/products/Giày Supertar XLG/3.jpg',
            'idProduct'=>'3',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Supertar XLG - ảnh 4',
            'urlHinh'=>'img/products/Giày Supertar XLG/4.jpg',
            'idProduct'=>'3',
        ]);

        ProductGalleryModel::create([
            'name'=>'Giày Adiform Climacool - ảnh 2',
            'urlHinh'=>'img/products/Giày Adiform Climacool/2.jpg',
            'idProduct'=>'4',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Adiform Climacool - ảnh 3',
            'urlHinh'=>'img/products/Giày Adiform Climacool/3.jpg',
            'idProduct'=>'4',
        ]);
        ProductGalleryModel::create([
            'name'=>'Giày Adiform Climacool - ảnh 4',
            'urlHinh'=>'img/products/Giày Adiform Climacool/4.jpg',
            'idProduct'=>'4',
        ]);
    }
}
