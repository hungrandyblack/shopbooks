<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider         = new Slider();
        $slider->name   = "Banner Sách Tiểu Thuyết";
        $slider->image  = "banner-sach-ktkn.jpg";
        $slider->link   = "";
        $slider->save();

        $slider         = new Slider();
        $slider->name   = 'Sách Trinh Thám';
        $slider->image  = 'banner-sach-moi.jpg';
        $slider->link   = "";
        $slider->save();

        $slider         = new Slider();
        $slider->name   = 'Sách Hoạt Hình';
        $slider->image  = 'banner-delivery-fb.png';
        $slider->link   = "";
        $slider->save();

        $slider         = new Slider();
        $slider->name   = 'Sách Khoa Học';
        $slider->image  = 'banner-sach-moi.jpg';
        $slider->link   = "";
        $slider->save();

        $slider         = new Slider();
        $slider->name   = 'Sách Ngôn Tình';
        $slider->image  = 'banner-beethoven.jpg';
        $slider->link   = "";
        $slider->save();
    }
}
