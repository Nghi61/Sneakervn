<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategories;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategories::create([
            'idProduct'=>'1',
            'idCategories'=>'2',
        ]);
        ProductCategories::create([
            'idProduct'=>'1',
            'idCategories'=>'10',
        ]);
        ProductCategories::create([
            'idProduct'=>'2',
            'idCategories'=>'2',
        ]);
        ProductCategories::create([
            'idProduct'=>'2',
            'idCategories'=>'10',
        ]);
        ProductCategories::create([
            'idProduct'=>'3',
            'idCategories'=>'2',
        ]);
        ProductCategories::create([
            'idProduct'=>'3',
            'idCategories'=>'10',
        ]);
        ProductCategories::create([
            'idProduct'=>'4',
            'idCategories'=>'2',
        ]);
        ProductCategories::create([
            'idProduct'=>'4',
            'idCategories'=>'11',
        ]);
    }

}
