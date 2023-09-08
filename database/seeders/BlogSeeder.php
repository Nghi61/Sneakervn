<?php

namespace Database\Seeders;

use App\Models\BlogModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogModel::create([
            'title' => '3 kiểu giày sneaker đáng sắm nhất mùa Thu - Đông giúp chị em F5 phong cách',
            'content' => 'Đang cập nhật...',
            'urlHinh'=>'img/blog/1.jpg',
            'view'=>0,
            'idUser'=>1,
            'slug'=>Str::slug('3 kiểu giày sneaker đáng sắm nhất mùa Thu - Đông giúp chị em F5 phong cách')
        ]);
        BlogModel::create([
            'title' => '6 cách biến hóa đồ công sở với giày sneaker chuẩn thanh lịch và sành điệu',
            'content' => 'Đang cập nhật...',
            'urlHinh'=>'img/blog/2.jpg',
            'view'=>0,
            'idUser'=>1,
            'slug'=>Str::slug('6 cách biến hóa đồ công sở với giày sneaker chuẩn thanh lịch và sành điệu')
        ]);
        BlogModel::create([
            'title' => 'Điểm danh những kiểu váy xinh yêu không thể thiếu trong vali du lịch ngày hè',
            'content' => 'Đang cập nhật...',
            'urlHinh'=>'img/blog/3.png',
            'view'=>0,
            'idUser'=>1,
            'slug'=>Str::slug('Điểm danh những kiểu váy xinh yêu không thể thiếu trong vali du lịch ngày hè')
        ]);
        BlogModel::create([
            'title' => '4 kiểu giày sneaker "lệch pha" khi lên đồ, ngày Tết chị em nên lưu ý',
            'content' => 'Đang cập nhật...',
            'urlHinh'=>'img/blog/4.jpg',
            'view'=>0,
            'idUser'=>1,
            'slug'=>Str::slug('4 kiểu giày sneaker "lệch pha" khi lên đồ, ngày Tết chị em nên lưu ý')
        ]);
    }
}
