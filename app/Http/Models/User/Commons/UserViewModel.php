<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 *
 */

namespace App\Http\Models\User\Commons;

/**
 * UserViewModel class
 */
class UserViewModel
{
    /** @var string */
    public $id;
    /** @var string */
    public $name;

    /**
     * UserViewModel constructer
     *
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
