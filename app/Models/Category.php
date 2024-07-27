<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories'; 

   protected $fillable = ['name'];

   public function product(){
      return $this->hasMany(product::class, 'category_id', 'id'); 
   }
}
