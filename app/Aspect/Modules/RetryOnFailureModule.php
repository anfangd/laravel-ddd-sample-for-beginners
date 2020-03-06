<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\RetryOnFailureModule as PackageRetryOnFailureModule;

/**
 * Class RetryOnFailureModule
 */
class RetryOnFailureModule extends PackageRetryOnFailureModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
