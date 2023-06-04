<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["category_id", "name", "price", "comment", "img1_path", "img2_path", "img3_path", "img4_img"];

    public static $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'price' => 'required|intenger|min:0',
        'comment' => 'string',
        'img1_path' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    // お気に入りされているかを判定するメソッド
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }
}
