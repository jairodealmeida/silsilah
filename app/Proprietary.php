<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietary extends Model
{
    protected $fillable = [
        'id',
        'name',
        'cpf',
        'rg',
        'phone', 
        'mobile',
        'address',
        'num_address',   
        'comp_address', 
        'cep', 
        'manager_id'
    ];

    
}
