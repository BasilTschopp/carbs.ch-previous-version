#### About
Carbs.ch allows the calculation of carbohydrates and other nutrients in meals. This is particularly useful for athletes to optimize energy intake for training and recovery, as well as for individuals with type 1 diabetes to determine bolus insulin based on carbohydrate content. Compared to other platforms, carbs.ch provides common serving sizes directly for each food item, as these are often difficult to estimate and usually only given per 100g or 100ml. This allows for a more accurate calculation of nutritional values

#### Source Information
General nutritional values per 100g or 100ml for the foods are from Naehrwertdaten.ch. Product-specific nutritional values are from the producer's website. The portion sizes come from various non-proprietary sources.

#### Framework and Library
Laravel PHP Framework and the jQuery Library.

#### Database
The food data is stored as CSV files in the database/data folder and is automatically loaded into the database after the structure is created using the Laravel command ‘php artisan migrate’.

#### License
Laravel and jQuery are released under the MIT license, as is carbs.ch — so feel free! If the database is used, please note that a source attribution to the Swiss Federal Food Safety and Veterinary Office (BLV) is required.
