<?php
namespace App\Repositories\Impl;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductRepositoryImpl extends EloquentRepository  implements ProductRepository
{
    public function paginate()
    {
        $products = DB::table("products")->join("categories","categories.id","products.category_id")->select("categories.name as name_categories","products.*")
        ->where("products.deleted_at",null)->paginate(5);
        return $products;
    }
    public function findById($id){
        $product = DB::table("products")->join("categories","categories.id","products.category_id")
        ->select("categories.name as name_categories","products.*")->where("products.id",$id)->first();
        return $product;
    }
    /**
     * get Model
     * @return string
     */
    public function create($request){
        $data = $request->only('name', 'price', 'category_id', 'status','description','supplier','quantity',"author_id",'supplier_id',"discount_price");
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
        Product::create($data);
        Session::flash("success","thêm sách  thành công");
        return redirect()->route('products.index')->with('success', ' Thêm sản phẩm '.$request->name. ' thành công ');
     
      }
    public function getModel()
    {
        $model = Product::class;
        return $model;
    }
    
    public function categories($id)
    {
        $categories = DB::table('products')->where("category_id",$id)->get();
        return $categories;
    }

    public function product_detail($id)
    {   
        $product_detail = Product::find($id);
        return  $product_detail;
    }

    public function related_products($id)
    {
        // query buidle từ bảng products select * from products WHERE category_id = 1
       $related_products = DB::table('products')->where('category_id',$id)->get();
       return $related_products;
    }
   
    public function filterProduct($orderBy){
        $filterProducts = DB::table('products')->orderBy('price',"".$orderBy."")->get();
        return $filterProducts;
    }

    public function update($data,$id){
     
        $product =  Product::find($id);
        
        $new_image = $product->image;
        if ($data->hasFile('image')) {
            $get_image          = $data->image;
            $path               = 'front-end/images';
            $get_name_image     = $get_image->getClientOriginalName();
            $name_image         = current(explode('.', $get_name_image));
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
        }
        $product->image = $new_image;   
        $product->name             = $data->name;
        $product->discount_price             = $data->discount_price;
        $product->description      = $data->description;
        $product->name             = $data->name;
        $product->quantity         = $data->quantity;
        $product->price            = $data->price;  
        $product->category_id      = $data->category_id;  
        $product->supplier_id      = $data->supplier_id;  
        $product->author_id        = $data->author_id;
        $product->save();
        Session::flash("success","thay đổi sách  thành công");

        return $product;  
    }

    public function destroy($id){
        $product   = Product::find($id);
        $product->delete();
        return $product;  
    }
    public function discountPrice($discountPrice){
        $products = $this->model->where("discount_price",$discountPrice)->get() ;
        return $products;  
        
    }
}