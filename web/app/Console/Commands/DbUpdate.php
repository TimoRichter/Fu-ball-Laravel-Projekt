<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updates db';

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
        \Artisan::call('db:copy');
        echo "table copied \n";
        \Artisan::call('download:csv');
        echo"csv files downloaded \n";
        \Artisan::call('import:csv');
        echo"csv files imported \n";
        \Artisan::call('stats:create');
        echo"update was successful\n";


    }
}
