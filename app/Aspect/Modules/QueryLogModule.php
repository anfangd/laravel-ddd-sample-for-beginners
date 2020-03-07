<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\QueryLogModule as PackageQueryLogModule;

/**
 * Class QueryLogModule
 */
class QueryLogModule extends PackageQueryLogModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
