<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Customer;
use  App\Models\Order_detail;

class Order extends Model
{
    use HasFactory;
    protected $table    ="orders";
    protected $fillable = ['id','total','customer_id','status'];
    public $timestamps  = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class , 'customer_id' , 'id');
    }
    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
