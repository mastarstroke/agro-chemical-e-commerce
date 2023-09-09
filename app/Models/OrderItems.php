<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderItems extends Model
{
    use HasFactory;

    protected $table= 'order_items';
    protected $fillable= [
        'order_id',
        'prod_id',
        'prod_qty',
        'price',
    ];

           /**
    * Get the products that owns the OrdersItem
    *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function products()
  {
      return $this->belongsTo(Product::class, 'prod_id', 'id');
  }
}
