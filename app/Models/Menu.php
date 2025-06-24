<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;
class Menu extends Model
{
    // nomor 3
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
