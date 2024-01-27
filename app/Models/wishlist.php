<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'favoris';
    protected $fillable = [
        'user_id',
        'product_id',
    ];

//    public function user(): BelongsTo
//    {
//     return $this->belongsTo(User::class, 'foreign_key','other_key');
//    }
   public function products(): BelongsTo
   {
    return $this->belongsTo(Product::class, 'product_id','id');
   }

//     public static function validate($request)
//     {
//         $request->validate([
//             "product_id" => "required|numeric",
//             "user_id" => "required|numeric",
            
//         ]);
// }

// public function getProduct_id()
// {
//     return $this->attributes['product_id'];
// }

// public function setProduct_id($product_id)
// {
//     $this->attributes['product_id'] = $product_id;
// }


// public function getUser_id()
// {
//     return $this->attributes['user_id'];
// }

// public function settUser_id($user_id)
// {
//     $this->attributes['user_id'] = $user_id;
// }
}
