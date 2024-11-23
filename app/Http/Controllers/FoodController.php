<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodCategoriesParent;
use App\Models\FoodCategoriesChild;
use App\Models\FoodItems;

class FoodController {

    public function getCategories() {
        $ParentCategories = FoodCategoriesParent::with('categories')->get();
        return view('food/categories', compact('ParentCategories'));
    }

    public function getItems(Request $request) {
        $CategoryID   = $request->query('CategoryID');
        $CategoryName = FoodItems::getCategoryName($CategoryID);
        $Items        = FoodItems::getItemsByCategory($CategoryID);

        foreach ($Items as $Item) {
            $Item->ServingCount = FoodItems::getServingCount($Item->id);
        }

        return view('food/items', compact('CategoryName', 'Items'));
    }

    public function ajaxItems(Request $request) {

        $ItemID = $request->query('id');
        $Item   = FoodItems::getSpecificItem($ItemID);

        return view('ajax/food-items', compact('Item'));
    }

    public function ajaxServings(Request $request) {

        $ItemID   = $request->query('id');
        $Servings = FoodItems::getServingsByItemID($ItemID);

        return view('ajax/food-servings', compact('Servings'));
    }
}
