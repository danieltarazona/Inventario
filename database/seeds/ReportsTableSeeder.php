<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Report::class)->create(['name' => trans('strings.users')]);
        factory(App\Report::class)->create(['name' => trans('strings.orders')]);
        factory(App\Report::class)->create(['name' => trans('strings.sales')]);
        factory(App\Report::class)->create(['name' => trans('strings.repairs')]);
        factory(App\Report::class)->create(['name' => trans('strings.products')]);
    }
}
