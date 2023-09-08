<?php

namespace Database\Seeders;
use App\Models\ProductModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductModel::create([
            'name' => 'Giày Reponse CL',
            'description' => 'ĐÔI GIÀY TRAINER PHONG CÁCH OUTDOOR VỚI THIẾT KẾ BỤI BẶM.
            Phong cách sẵn sàng cho tất cả. Đôi Giày adidas Response CL này có kết cấu mô phỏng giày chạy trail. Đế giữa siêu nhẹ và mềm mại giúp bạn luôn thoải mái suốt những bữa tiệc nấu ngoài trời kéo dài nhất. Bởi ra ngoài đâu có nghĩa là phải đau đầu suy nghĩ?',
            'price' => 3300000,
            'sale' => 3000000,
            'quantity' => 100,
            'urlHinh'=>'img/products/Giày Reponse CL/1.jpg',
            'view'=>0,
            'slug'=>str::slug('Giày Reponse CL')
        ]);
        ProductModel::create([
            'name' => 'Giày Hanball Spezial',
            'description' => '',
            'price' => 2700000,
            'sale' => 2500000,
            'quantity' => 100,
            'urlHinh'=>'img/products/Giày Hanball Spezial/1.jpg',
            'slug'=>str::slug('Giày Hanball Spezial'),
            'view'=>0,
        ]);
        ProductModel::create([
            'name' => 'Giày Supertar XLG',
            'description' => 'ĐÔI GIÀY TRAINER CLASSIC PHIÊN BẢN MỚI VỚI CÁC CHI TIẾT ĐƯƠNG ĐẠI.
            Tưởng rằng giày adidas Superstar không thể nào táo bạo hơn nữa, nhưng phiên bản này phóng đại mẫu giày trainer classic thập niên 70 tạo nên phong cách thời trang hiện đại. Tỷ lệ thiết kế oversize và cá tính mạnh mẽ không kém thể hiện rõ ràng qua 3 Sọc răng cưa biểu tượng. Thân giày hoàn toàn bằng da trung thành với chất vintage, đồng thời biến hóa kiểu dáng cho phong cách mới mẻ. Tự tin sải bước khi đã có mũi giày vỏ sò dẫn lối.',
            'price' => 3000000,
            'sale' => 3000000,
            'quantity' => 100,
            'urlHinh'=>'img/products/Giày Supertar XLG/1.jpg',
            'slug'=>str::slug('Giày Supertar XLG'),
            'view'=>0,
        ]);
        ProductModel::create([
            'name' => 'Giày Adiform Climacool',
            'description' => '',
            'price' => 2600000,
            'sale' => 2500000,
            'quantity' => 100,
            'urlHinh'=>'img/products/Giày Adiform Climacool/1.jpg',
            'slug'=>str::slug('Giày Adiform Climacool'),
            'view'=>0,
        ]);
    }
}
