<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Event::class, 3)->create([
          'product_id' => 6
        ]);

        factory(App\Event::class, 3)->create([
          'product_id' => 7
        ]);

        echo "Done" . PHP_EOL;
    }
}
