<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = [
        'id',
        'broodtotal',
        'certifyduedate',
        'title',
        'description',
        'manager_id'
    ];
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

     /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';
}
