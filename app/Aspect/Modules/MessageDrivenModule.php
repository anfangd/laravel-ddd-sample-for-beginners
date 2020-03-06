<?php
declare(strict_types=1);

namespace App\Aspect\Modules;

use Ytake\LaravelAspect\Modules\MessageDrivenModule as PackageMessageDrivenModule;

/**
 * Class MessageDrivenModule
 */
class MessageDrivenModule extends PackageMessageDrivenModule
{
    /** @var array */
    protected $classes = [
        // example
        // \App\Services\AcmeService::class
    ];
}
