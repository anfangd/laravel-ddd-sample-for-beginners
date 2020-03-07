<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\CacheEvictModule as PackageCacheEvictModule;

/**
 * Class CacheEvictModule
 */
class CacheEvictModule extends PackageCacheEvictModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
