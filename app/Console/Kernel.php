<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    public function __construct(\Laravel\Lumen\Application $app)
    {
        parent::__construct($app);
        
        $this->app->make('url')->forceRootUrl(env('APP_URL', 'http://localhost/'));
    }
    
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        //
    }
}
