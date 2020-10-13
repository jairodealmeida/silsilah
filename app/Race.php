<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'name',
        'specie',
        'genotype',
        'origin',
        'description'     
    ];
    
}
