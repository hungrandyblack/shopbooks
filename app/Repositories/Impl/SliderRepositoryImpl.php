<?php

namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\SliderRepository;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderRepositoryImpl extends EloquentRepository  implements SliderRepository
{
    /**
     * get Model
     * @return string
     */

    public function create($request)
    {
        $data = $request->only('name', 'image', 'link');
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'front-end/images';
            $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg
            //explode "." [abc,jpg]
            $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
            $data['image']   = $new_image;
        }
        // dd($data);
        Slider::create($data);
        Session::flash("success", "thêm sách  thành công");
        return redirect()->route('sliders.index')->with('success', ' Thêm sản phẩm ' . $request->name . ' thành công ');
    }

    public function getModel()
    {
        $model = Slider::class;
        return $model;
    }

    public function destroy($id)
    {
        $slider   = Slider::find($id);
        $slider->delete();
        return $slider;
    }
    public function update($data, $id)
    {
        $slider =  Slider::find($id);
        $slider->name           = $data->name;
        $new_image = $slider->image;
        if ($data->hasFile('image')) {
            $get_image          = $data->image;
            $path               = 'front-end/images';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
        }
        $slider->image      = $new_image;
        $slider->link       = $data->link;
        $slider->save();
        Session::flash("success", "thay đổi sách  thành công");

        return $slider;
    }

    public function paginate()
    {
        $slider = Slider::paginate(5);
        return $slider;
    }
}
