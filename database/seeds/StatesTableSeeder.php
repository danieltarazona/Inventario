<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\State::class)->create(['id' => 200, 'name' => 'Active']);
      factory(App\State::class)->create(['id' => 201, 'name' => 'Inactive']);

      factory(App\State::class)->create(['id' => 300, 'name' => 'Available']);
      factory(App\State::class)->create(['id' => 301, 'name' => 'On-Order']);
      factory(App\State::class)->create(['id' => 302, 'name' => 'On-Loan']);
      factory(App\State::class)->create(['id' => 303, 'name' => 'On-Maintenance']);
      factory(App\State::class)->create(['id' => 304, 'name' => 'Damage']);

      factory(App\State::class)->create(['id' => 400, 'name' => 'Complete']);
      factory(App\State::class)->create(['id' => 401, 'name' => 'Waiting']);
      factory(App\State::class)->create(['id' => 402, 'name' => 'Returned']);
      factory(App\State::class)->create(['id' => 403, 'name' => 'Cancelled']);
      factory(App\State::class)->create(['id' => 404, 'name' => 'Product or Products Not Found']);
    }
}
