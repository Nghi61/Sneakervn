<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductGallerySeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(ProductCategoriesSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
