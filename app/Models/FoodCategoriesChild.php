<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategoriesChild extends Model {

    protected $table = 'food_categories_child';

    public function parentCategory() {
        return $this->belongsTo(FoodCategoriesParent::class, 'ParentID', 'id');
    }
}