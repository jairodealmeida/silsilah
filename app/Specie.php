<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'classe'
    ];
}
