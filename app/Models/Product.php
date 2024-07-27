<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';

   protected $fillable = ['author','name', 'price', 'sale_price', 'image', 'description', 'category_id'];

   public function category()
   {
      return $this->hasOne(Category::class, 'id', 'category_id');
   }

   public function scopeSrearch($query)
   {
      $keyword = request('keyword');
      $category_id = request('category_id');
      if ($keyword) {
         $query = $query->orderBy('id', 'DESC')
            ->where('name', 'LIKE', '%' . $keyword . '%');
      }
      if ($category_id) {
         $query = $query->where('category_id', $category_id);
      }
      return $query->orderBy('id','DESC');
   }
}
