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
}
