<?php

use Illuminate\Database\Seeder;

class RangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Type::class)->create(['name' => trans('strings.day')]);
      factory(App\Type::class)->create(['name' => trans('strings.month')]);
      factory(App\Type::class)->create(['name' => trans('strings.year')]);
      factory(App\Type::class)->create(['name' => trans('strings.bimestre')]);
      factory(App\Type::class)->create(['name' => trans('strings.trimestre')]);
      factory(App\Type::class)->create(['name' => trans('strings.semester')]);
    }
}
