<?php

use CodeCommerce\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::Create();

        Address::create([
        	'user_id' => 1,
			'address' => $faker->streetName,
			'number' => $faker->numberBetween(100, 500),
			'complement' => $faker->numberBetween(5, 75),
			'city' => $faker->city,
			'state' => $faker->word
		]);
        Address::create([
        	'user_id' => 2,
			'address' => $faker->streetName,
			'number' => $faker->numberBetween(100, 500),
			'complement' => $faker->numberBetween(5, 75),
			'city' => $faker->city,
			'state' => $faker->word
		]);
    }
}
