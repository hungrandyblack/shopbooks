<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Order;
use  App\Models\Product;

class Order_detail extends Model
{
    use HasFactory;
    protected $table    ="order_details";
    protected $fillable = ['id','product_id','order_id','price','quantity'];
    public $timestamps  = false;

    public function order() {
        return $this->belongsTo(Order::class , 'order_id' , 'id');
    }
    public function product() {
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}
