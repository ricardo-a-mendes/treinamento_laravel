<?php

use CodeCommerce\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['description' => 'Order Received']);
        Status::create(['description' => 'Payment Received']);
        Status::create(['description' => 'Shipping in progress']);
        Status::create(['description' => 'Delivered']);
    }
}
