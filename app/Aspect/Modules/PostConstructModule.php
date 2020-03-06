<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\PostConstructModule as PackagePostConstructModule;

/**
 * Class PostConstructModule
 */
class PostConstructModule extends PackagePostConstructModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
