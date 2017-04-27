<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use CodeCommerce\Entities\Category;
use CodeCommerce\Entities\Product;
use CodeCommerce\Entities\Tag;
use CodeCommerce\Entities\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    $categoryName = $faker->sentence(2);
    return [
        'name' => $categoryName,
        'description' => $faker->sentence,
        'slug' => str_slug($categoryName, '-'),
    ];
});

$factory->define(Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(2, 20, 500),
        'featured' => $faker->boolean(30),
        'recommend' => $faker->boolean(),
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
