<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\LoggableModule as PackageLoggableModule;

/**
 * Class LoggableModule
 */
class LoggableModule extends PackageLoggableModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
        \App\Http\Controllers\UserController::class
    ];
}
