<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;
    protected $table    = "customers";
    protected $fillable = ['id', 'name', 'email','phone','address','gender'];
    public $timestamps  = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
