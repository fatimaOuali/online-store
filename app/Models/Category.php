<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required"
        ]);
    }
    public function getId() {
        return $this->attributes['id'];
    }
    public function getName() {
        return $this->attributes['name'];
    }
    public function setName($name) {
        $this->attributes['name'] = $name;
    }
    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt) {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt() {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt) {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function getDescription() {
        return $this->attributes['description'];
    }
    public function setDescription($description) {
        $this->attributes['description'] = $description;
    }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function getProducts() {
        return $this->products;
    }
    public function setProducts($products) {
        $this->products = $products;
    }


}
