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
