<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    //
    protected $table = 'idenfications';

    //
    protected $fillable = [
        'code', 'city', 'abbr', 'adjust'
    ];

    protected $casts = [
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime',
    ];
}
