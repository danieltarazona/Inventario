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

      factory(App\State::class)->create([
        'id' => 201,
        'name' => 'Inactive',
        'label' => 'label label-default'
      ]);

      factory(App\State::class)->create(['id' => 300, 'name' => 'Available']);

      factory(App\State::class)->create([
        'id' => 302,
        'name' => 'On-Loan',
        'label' => 'label label-info'
      ]);

      factory(App\State::class)->create([
        'id' => 303,
        'name' => 'On-Maintenance',
        'label' => 'label label-warning'
      ]);

      factory(App\State::class)->create([
        'id' => 304,
        'name' => 'Damage',
        'label' => 'label label-danger'
      ]);

      factory(App\State::class)->create(['id' => 400, 'name' => 'Complete']);

      factory(App\State::class)->create([
        'id' => 401,
        'name' => 'Waiting',
        'label' => 'label label-warning'
      ]);

      factory(App\State::class)->create([
        'id' => 402,
        'name' => 'Returned',
        'label' => 'label label-primary'
      ]);

      factory(App\State::class)->create([
        'id' => 403,
        'name' => 'Cancelled',
        'label' => 'label label-default'
      ]);

      factory(App\State::class)->create([
        'id' => 404,
        'name' => 'Product or Products Not Found',
        'label' => 'label laber-warning'
      ]);

      echo "Done" . PHP_EOL;

    }
}
