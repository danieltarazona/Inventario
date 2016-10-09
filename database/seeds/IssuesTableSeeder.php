<?php

use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $issues = factory(App\Issue::class, 10)->create()->each(function($issue)
      {
        $user = App\User::find(1);
        $user->issue()->save($issue);
      });

      echo "Done" . PHP_EOL;
    }
}
