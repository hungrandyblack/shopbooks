<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new Category();
        $categories->name       = 'Sách Trinh Thám';
        $categories->image      = 'banner-sach-moi.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Tiểu Thuyết';
        $categories->image      = 'banner-sach-ktkn.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Hoạt Hình';
        $categories->image      = 'banner-delivery-fb.png';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Khoa Học';
        $categories->image      = 'banner-sach-moi.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Ngôn Tình';
        $categories->image      = 'banner-beethoven.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Truyện Kinh Dị';
        $categories->image      = 'banner-delivery-fb.png';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Kĩ Năng-Kinh Tế';
        $categories->image      = 'neu-toi-biet-duoc-khi-20-full-banner.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Giáo Dục-Gia Đình';
        $categories->image      = 'sach-moi-full-banner.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Y Học';
        $categories->image      = 'sach-moi-full-banner.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

        $categories = new Category();
        $categories->name       = 'Sách Văn Học Nước Ngoài';
        $categories->image      = 'sach-moi-full-banner.jpg';
        $categories->parent_id  = 0 ;
        $categories->save();

   
    }
}
