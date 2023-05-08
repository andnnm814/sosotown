<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["category_id", "name", "price", "comment", "img1_path", "img2_path", "img3_path", "img4_img"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
