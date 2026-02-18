<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Try to override limits at runtime
@ini_set('upload_max_filesize', '100M');
@ini_set('post_max_size', '100M');
@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', '300');

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Auto Loader...
require __DIR__.'/../vendor/autoload.php';

// Run The Application...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
