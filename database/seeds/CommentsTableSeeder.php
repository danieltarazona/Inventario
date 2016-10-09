<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $comments = factory(App\Comment::class, 10)->create()->each(function($comment)
      {
        $user = App\User::find(1);
        $issue = App\Issue::find(1);
        $user->comment()->save($comment);
        $issue->comment()->save($comment);
      });

      echo "Done" . PHP_EOL;
    }
}
