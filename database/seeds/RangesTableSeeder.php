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
      factory(App\Range::class)->create(['name' => trans('strings.day')]);
      factory(App\Range::class)->create(['name' => trans('strings.month')]);
      factory(App\Range::class)->create(['name' => trans('strings.year')]);
      factory(App\Range::class)->create(['name' => trans('strings.bimestre')]);
      factory(App\Range::class)->create(['name' => trans('strings.trimestre')]);
      factory(App\Range::class)->create(['name' => trans('strings.semester')]);
    }
}
