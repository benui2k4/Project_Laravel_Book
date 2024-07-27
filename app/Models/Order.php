<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','address','note','token','customer_id','status'];
    public $appends = ['total'];
    // total
    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }

    public function getTotalAttribute() {
        $t = 0;
        foreach($this->details as $dt) {
            $t += $dt->price * $dt->quantity;
        }

        return $t;
    }
}
