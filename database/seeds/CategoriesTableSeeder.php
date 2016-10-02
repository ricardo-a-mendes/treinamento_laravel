<?php

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('categories')->delete();
        
        factory(Category::class, 7)->create()->each(function (Category $createdCategory) {
            for ($i = 0; $i < 6; $i++) {
                $productModel = factory(Product::class)->make();
                $createdCategory->products()->save($productModel);
            }
        });
    }
}
