<?php

namespace App\Repositories\Impl;

use App\Models\Category;
use App\Repositories\CategoriesRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesRepositoryImpl extends EloquentRepository  implements CategoriesRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Category::class;
        return $model;
    }
    public function getAll()
    {
        $categories = $this->model->where("parent_id", 0)->get();
        //    dd($categories);
        foreach ($categories as $category) {
            if ($category->parent_id == 0) {
                $chillCategories = $this->model->where("parent_id", $category->id)->get();
                $category->chillCategories = $chillCategories;
            }
        }

        //    dd($categories);

        return $categories;
    }
    public function findById($id)
    {
        $customer = Category::find($id);
        // dd($customer);
        return $customer;
    }
    public function paginate()
    {
        $categories = Category::paginate(5);
        return $categories;
    }
    public function create($request)
    {
        $data = $request->only('name');
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
            $data['image']      = $new_image;
            $data['parent_id']  = $request->parent_id;
        }
        // dd($data);
        Category::create($data);
        Session::flash("success", "Thêm mới Danh Mục thành công");

        return redirect()->route('categories.index');
    }
    public function update($request, $id)
    {
        $product             =  Category::find($id);
        $new_image           = $product->image;
        if ($request->hasFile('image')) {
            $get_image       = $request->image;
            $path            = 'front-end/images';
            $get_name_image  = $get_image->getClientOriginalName();
            $name_image      = current(explode('.', $get_name_image));
            $new_image       = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
        }
        $product->image      = $new_image;
        $product->name       = $request->name;
        $product->parent_id       = $request->parent_id;
        $product->save();
        return $product;
    }

    public function destroy($id)
    {
        $product  = Category::find($id);
        $product->delete();
        return $product;
    }
    public function  getParentCategories()
    {
        $parentCategories = $this->model->where("parent_id", 0)->get();
        return $parentCategories;
    }
    public function fillterCategories($category_id, $oderBy)
    {

        $categories     =  DB::table('products')->where("category_id", $category_id)->orderBy('price', $oderBy)->get();
        return $categories;
    }
}
