<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {

        Schema::create('food_categories_parent', function (Blueprint $table) {
            $table->id();
            $table->string('ParentCategoryName');
            $table->integer('Order');
            $table->integer('Active');
        });

        Schema::create('food_categories_child', function (Blueprint $table) {
            $table->id();
            $table->integer('ParentID');
            $table->string('CategoryName');
            $table->integer('Order');
            $table->integer('Active');
        });

        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->integer('CategoryID');
            $table->string('ItemName');
            $table->integer('Carbs');
            $table->integer('Sugar');
            $table->integer('Fibers');
            $table->integer('Fat');
            $table->string('Unit');
            $table->integer('Active');
        });

        Schema::create('food_servings', function (Blueprint $table) {
            $table->id();
            $table->integer('ItemID');
            $table->string('ServingName');
            $table->integer('ServingSize');
        });

        $this->ImportFoodCategoriesParent();
        $this->ImportFoodCategoriesChild();
        $this->ImportFoodItems();
        $this->ImportFoodServings();

    }

    private function ImportFoodCategoriesParent(): void {

        $csvFilePath = base_path('database/import/food_categories_parent.csv');

        if (($handle = fopen($csvFilePath, 'r')) !== false) {

            fgetcsv($handle); //skip the first line

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
    
                DB::table('food_categories_parent')->insert([
                    'ParentCategoryName' => $data[1],
                    'Order' => $data[2],
                    'Active' => $data[3],
                ]);
            }

            fclose($handle);
        }
    }

    private function ImportFoodCategoriesChild(): void {

        $csvFilePath = base_path('database/import/food_categories_child.csv');

        if (($handle = fopen($csvFilePath, 'r')) !== false) {

            fgetcsv($handle); //skip the first line

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
    
                DB::table('food_categories_child')->insert([
                    'ParentID' => $data[1],
                    'CategoryName' => $data[2],
                    'Order' => $data[3],
                    'Active' => $data[4],
                ]);
            }

            fclose($handle);
        }
    }

    private function ImportFoodItems(): void {

        $csvFilePath = base_path('database/import/food_items.csv');

        if (($handle = fopen($csvFilePath, 'r')) !== false) {

            fgetcsv($handle); //skip the first line

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
    
                DB::table('food_items')->insert([
                    'CategoryID' => $data[1],
                    'ItemName' => $data[2],
                    'Carbs' => $data[3],
                    'Sugar' => $data[4],
                    'Fibers' => $data[5],
                    'Fat' => $data[6],
                    'Unit' => $data[7],
                    'Active' => $data[8],
                ]);
            }

            fclose($handle);
        }
    }

    private function ImportFoodServings(): void {

        $csvFilePath = base_path('database/import/food_servings.csv');

        if (($handle = fopen($csvFilePath, 'r')) !== false) {

            fgetcsv($handle); //skip the first line

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
    
                DB::table('food_servings')->insert([
                    'ItemID' => $data[1],
                    'ServingName' => $data[2],
                    'ServingSize' => $data[3],
                ]);
            }

            fclose($handle);
        }
    }

    public function down(): void {

        Schema::dropIfExists('food_categories_parent');
        Schema::dropIfExists('food_categories_child');
        Schema::dropIfExists('food_items');
        Schema::dropIfExists('food_servings');
        
    }

};