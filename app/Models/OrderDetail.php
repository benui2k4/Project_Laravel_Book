<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['order_id','price','quantity','product_id'];

    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
