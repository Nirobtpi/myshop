<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded;

    // relation with category 

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function subCategories(){
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }
    public function childCategories(){
        return $this->belongsTo(ChildCategory::class,'childcategory_id');
    }
    public function brands(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function wareHouses(){
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }
}
