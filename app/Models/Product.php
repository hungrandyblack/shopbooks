<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order_detail;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table    = 'products';
    protected $fillable = [ 'id','name','price','description','image'
                            ,'quantity','category_id','status','supplier_id'
                            ,'author_id',"discount_price"];
    public $timestamps  = false;

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
