<?php

namespace Database\Seeders;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::create([
            'name' => 'Không xác định',
            'slug'=>'khong-xac-dinh'
        ]);
        Categories::create([
            'name' => 'Original',
            'slug'=>'original'
        ]);
        Categories::create([
            'name' => 'Bóng đá',
            'slug'=>'bong-da'
        ]);
        Categories::create([
            'name' => 'Chạy',
            'slug'=>'Chạy'
        ]);
        Categories::create([
            'name' => 'Tập luyện',
            'slug'=>'tap-luyen'
        ]);
        Categories::create([
            'name' => 'Essentials',
            'slug'=>'essentials'
        ]);
        Categories::create([
            'name' => 'Ngoài trời',
            'slug'=>'ngoai-troi'
        ]);
        Categories::create([
            'name' => 'Bóng rổ',
            'slug'=>'bong-ro'
        ]);
        Categories::create([
            'name' => 'Tennis',
            'slug'=>'tennis'
        ]);
        Categories::create([
            'name' => 'Nam',
            'slug'=>'nam'
        ]);
        Categories::create([
            'name' => 'Nữ',
            'slug'=>'nu'
        ]);
    }
}
