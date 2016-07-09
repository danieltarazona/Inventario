<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Restart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete  and Migrate Database to Open Tinker';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      //
    }
}
