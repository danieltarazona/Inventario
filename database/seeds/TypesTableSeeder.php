<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Type::class)->create(['name' => trans('strings.users')]);
      factory(App\Type::class)->create(['name' => trans('strings.orders')]);
      factory(App\Type::class)->create(['name' => trans('strings.sales')]);
      factory(App\Type::class)->create(['name' => trans('strings.repairs')]);
      factory(App\Type::class)->create(['name' => trans('strings.products')]);
    }
}
