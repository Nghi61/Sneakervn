<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'name' => 'Nguyễn Văn Nghi',
            'email' => 'nghinvps23655@fpt.edu.vn',
            'password' => Hash::make('123456789'),
            'role' => (string) 0,
            'phone' => '0353681506',
            'gender' => (string) 0,
            'avatar' => 'img/avatar/1_carousel.jpg',
            'birthday' =>  '2003/11/10',
        ]);

    }
}
