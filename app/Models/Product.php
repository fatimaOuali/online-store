<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Product_images;

class Product extends Model
{
    

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "category" => "required",
            "type" => "required",
            "price" => "required|numeric|gt:0",
           
            "sale" => "required|numeric|gt:0",
           
        ]);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;

    foreach ($products as $product) {
        $productId = $product->getId();

        // Ensure $productsInSession[$productId] is a valid integer
        $quantity = is_array($productsInSession[$productId]) ? $productsInSession[$productId]['quantity'] : $productsInSession[$productId];

        $total += $product->getPrice() * $quantity;
    }

    return $total;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function productImages()
    {
      return $this->hasMany(Product_images::class,'product_id', 'id');
    }

    public function productImage()
    {
      return $this->hasOne(Product_images::class,'product_id', 'id');
    }


    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }



// Sale 
    public function getSale()
    {
        return $this->attributes['sale'];
    }

    public function setSale($sale)
    {
        $this->attributes['sale'] = $sale;
    }
// Sale 


    public function getCategoryId()
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId($categoryId)
    {
        $this->attributes['category_id'] = $categoryId;
    }

    
    public function getTypeId()
    {
        return $this->attributes['type_id'];
    }

    public function setTypeId($typeId)
    {
        $this->attributes['type_id'] = $typeId;
    }



    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
        
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function items()

    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function getCategory() {
        return $this->category;
    }
    public function setCategory($category) {
        $this->category = $category;
    }


    public function type() {
        return $this->belongsTo(Type::class);
    }
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
}
