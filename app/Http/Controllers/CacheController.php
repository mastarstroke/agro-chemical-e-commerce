<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class CacheController extends Controller
{
    public function caches()
    {
        Artisan::call('config:cache');
        echo "Config Cached Successfully </br>";
        Artisan::call('route:cache');
        echo "Route Cached Successfully </br>";
        Artisan::call('optimize');
        echo "Optimized Successfully </br>";
    }

    public function clearCaches()
    {
        Artisan::call('config:clear');
        echo "Config Cleared Successfully </br>";
        Artisan::call('route:clear');
        echo "Route Cleared Successfully </br>";
        Artisan::call('cache:clear');
        echo "Cache Cleared Successfully </br>";
        Artisan::call('view:clear');
        echo "View Cleared Successfully </br>";
    }
}
