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
}
