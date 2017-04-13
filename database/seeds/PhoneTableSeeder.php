<?php

use CodeCommerce\Phone;
use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::Create();
		Phone::create([
			'user_id' => 1,
			'number' => $faker->phoneNumber
		]);
		Phone::create([
			'user_id' => 2,
			'number' => $faker->phoneNumber
		]);
    }
}
