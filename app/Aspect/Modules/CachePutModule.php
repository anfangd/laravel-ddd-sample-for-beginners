<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\CachePutModule as PackageCachePutModule;

/**
 * Class CachePutModule
 */
class CachePutModule extends PackageCachePutModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
