<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategoriesModel;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategoriesModel::create([
            'idProduct'=>'1',
            'idCategories'=>'2',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'1',
            'idCategories'=>'10',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'2',
            'idCategories'=>'2',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'2',
            'idCategories'=>'10',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'3',
            'idCategories'=>'2',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'3',
            'idCategories'=>'10',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'4',
            'idCategories'=>'2',
        ]);
        ProductCategoriesModel::create([
            'idProduct'=>'4',
            'idCategories'=>'11',
        ]);
    }

}
