<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class)->create([
          'user_id' => 4,
          'state_id' => 401,
          'event_id' => 1
        ]);
    }
}
