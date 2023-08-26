<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    // protected $fillable = ['productName', 'image', 'brand', 'stock', 'price', 'category_id'];
    protected $fillable = ['name', 'description', 'category', 'price', 'brand'];


    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
