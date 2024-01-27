<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image'
    ];

    public static function validate($request)
    {
        $request->validate([
            "product_id" => "required|numeric",
            "image" => "nullable"
        ]);
}

public function getProduct_id()
{
    return $this->attributes['product_id'];
}

public function setProduct_id($product_id)
{
    $this->attributes['product_id'] = $product_id;
}

public function getImage()
{
    return $this->attributes['image'];
}

public function setImage($image)
{
    $this->attributes['image'] = $image;
}

}
