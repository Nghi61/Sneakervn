<?php

namespace Database\Seeders;
use App\Models\CategoriesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriesModel::create([
            'name' => 'Không xác định',
            'slug'=>'khong-xac-dinh'
        ]);
        CategoriesModel::create([
            'name' => 'Original',
            'slug'=>'original'
        ]);
        CategoriesModel::create([
            'name' => 'Bóng đá',
            'slug'=>'bong-da'
        ]);
        CategoriesModel::create([
            'name' => 'Chạy',
            'slug'=>'Chạy'
        ]);
        CategoriesModel::create([
            'name' => 'Tập luyện',
            'slug'=>'tap-luyen'
        ]);
        CategoriesModel::create([
            'name' => 'Essentials',
            'slug'=>'essentials'
        ]);
        CategoriesModel::create([
            'name' => 'Ngoài trời',
            'slug'=>'ngoai-troi'
        ]);
        CategoriesModel::create([
            'name' => 'Bóng rổ',
            'slug'=>'bong-ro'
        ]);
        CategoriesModel::create([
            'name' => 'Tennis',
            'slug'=>'tennis'
        ]);
        CategoriesModel::create([
            'name' => 'Nam',
            'slug'=>'nam'
        ]);
        CategoriesModel::create([
            'name' => 'Nữ',
            'slug'=>'nu'
        ]);
    }
}
