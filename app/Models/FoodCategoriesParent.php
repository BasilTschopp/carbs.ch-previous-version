<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategoriesParent extends Model {

    protected $table = 'food_categories_parent';

    public function categories() {
        return $this->hasMany(FoodCategoriesChild::class, 'ParentID', 'id')->orderBy('Order', 'asc')->where('active', 1);;
    }
    
}