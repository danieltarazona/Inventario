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
      factory(App\State::class)->create([
        'id' => 200,
        'name' => trans('strings.active'),
        'label' => 'label label-primary'
      ]);

      factory(App\State::class)->create([
        'id' => 201,
        'name' => trans('strings.inactive'),
        'label' => 'label label-default'
      ]);

      factory(App\State::class)->create([
        'id' => 300,
        'name' => trans('strings.available')
      ]);

      factory(App\State::class)->create([
        'id' => 302,
        'name' => trans('strings.on_loan'),
        'label' => 'label label-info'
      ]);

      factory(App\State::class)->create([
        'id' => 303,
        'name' => trans('strings.on_maintenance'),
        'label' => 'label label-warning'
      ]);

      factory(App\State::class)->create([
        'id' => 304,
        'name' => trans('strings.damage'),
        'label' => 'label label-danger'
      ]);

      factory(App\State::class)->create([
        'id' => 400,
        'name' => trans('strings.complete'),
      ]);

      factory(App\State::class)->create([
        'id' => 401,
        'name' => trans('strings.on_waiting'),
        'label' => 'label label-warning'
      ]);

      factory(App\State::class)->create([
        'id' => 402,
        'name' => trans('strings.returned'),
        'label' => 'label label-primary'
      ]);

      factory(App\State::class)->create([
        'id' => 403,
        'name' => trans('strings.cancelled'),
        'label' => 'label label-default'
      ]);

      factory(App\State::class)->create([
        'id' => 404,
        'name' => trans('strings.product_not_found'),
        'label' => 'label laber-warning'
      ]);

      echo "Done" . PHP_EOL;

    }
}
