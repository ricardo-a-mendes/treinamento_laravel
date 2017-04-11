<?php

use CodeCommerce\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

		User::create([
			'name' => 'Ricardo',
			'email' => 'eng.rmendes@gmail.com',
			'password' => bcrypt('123456'),
			'is_admin' => 1
		]);

		User::create([
			'name' => 'Guest',
			'email' => 'guest@gmail.com',
			'password' => bcrypt('123456'),
			'is_admin' => 0
		]);

        factory(User::class, 10)->create();
    }
}
