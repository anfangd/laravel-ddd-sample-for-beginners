<?php

declare(strict_types=1);

/**
 * This file is part of DDD sample project.
 * 
 */

namespace App\Database\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'connection-name';

    /**
     * Table Name.
     *
     * @var string
     */
    protected $table = 't_users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_premium' => false,
    ];

    protected $fillable= array('id', 'name');
}
