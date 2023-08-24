<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function home()
    {
        return $this->hasMany(home::class);
    }

    public function product()
    {
        return $this->hasMany(product::class);
    }
}
