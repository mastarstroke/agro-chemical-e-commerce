<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderItems;

class Order extends Model
{
    use HasFactory;

    protected $table= 'orders';
    protected $fillable= [
        'user_id',
        'name',
        'country',
        'address',
        'state',
        'phone',
        'email',
        'message',
        'total_price',
        'status',
        'image',
    ];

    public function order_items()
    {
        return $this->hasMany(orderItems::class);
    }
}
