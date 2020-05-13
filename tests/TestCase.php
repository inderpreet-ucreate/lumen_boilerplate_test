<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;

abstract class TestCase extends \Laravel\Lumen\Testing\TestCase
{
    use DatabaseMigrations;
    
    public function createApplication() {
        $app = require __DIR__ . '/../bootstrap/app.php';
        
        $app->make('url')->forceRootUrl(env('APP_URL', 'http://localhost/'));
        
        return $app;
    }
}
