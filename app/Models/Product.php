<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
