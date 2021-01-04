<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    protected $fillable = [
        'id',
        'description',
        'registerquote',
        'duedate',
        'specie', 
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
