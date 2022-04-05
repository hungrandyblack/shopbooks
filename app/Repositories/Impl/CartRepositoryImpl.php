<?php

namespace App\Repositories\Impl;

use App\Models\Cart;
use App\Repositories\CartRepository;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CartRepositoryImpl extends EloquentRepository  implements CartRepository
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        $model = Cart::class;

        return $model;
    }
    public function create($data)
    {
        $value = (empty(session('cart_code'))) ? "" : session('cart_code');
      // sql bảng carts với code = value
        $carts = Cart::where("code",$value)->get();
            // duyệt vòng lặp để ra tìm ra sản phẩm bị trùng :
        foreach($carts as $cart){
            // if sản phẩm bị trùng id thì ta sẽ sử lý
            if($cart->product_id == $data["product_id"]){
                $cart = Cart::where("code",$value)->where("product_id",$cart->product_id)->first();
                $cart->quantity = $cart->quantity + $data["quantity"];
                $cart->save();
                return $cart;
            }
        }

        $cart = new Cart();
        $cart->price = ($data['price'] - ( $data['price'] /100 * $data['discount_price'] )  );
        $cart->quantity = $data['quantity'];
        $cart->code = $data['code'];
        $cart->product_id = $data['product_id'];
        $cart->save();
        return $cart;
    }
    // lay du lieu
    public function cartCode($id)
    {
        $cartCodes = Cart::where('code', $id)->get();

        $cartCodes = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->select(
                'products.image',
                'products.name',
                'carts.*',
                DB::raw("(carts.price * carts.quantity) as total")
            )
            ->where('code', $id)->get();
        return $cartCodes;
    }
    // tinh tong
    public function total($id)
    {
        // raw = sum
        $total = DB::table('carts')
            ->select(DB::raw("sum(carts.price * carts.quantity) as ToTal"))
            ->where('code', $id)->first();
        return $total;
    }
    // up date gio hang
    public function update($data, $object)
    {
        
        // lấy value là code
        $value = (empty(session('cart_code'))) ? "" : session('cart_code');

        // thực hiên duyêt vòng lặp $data["product_id];
        foreach ($data["product_id"] as $key => $product_id) {
            // eloquent với điều kiện product_id = $product:
            $cart_product = Cart::where('product_id', '=', $product_id)
                ->where('code', $value)
                ->first();

            $cart_product["quantity"] = $data["quantity"][$key];
            $cart_product->save();
        }
        return $cart_product;
    }

    public function findById($id)
    {
        $cart = DB::table('carts')
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->select(
            'products.image',
            'products.name',
            'carts.*',
            DB::raw("(carts.price * carts.quantity) as total")
        )->where("carts.id",$id)->first();
        return $cart;
    }
    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return $cart;
    }

}
