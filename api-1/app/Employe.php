<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property id
 * @property name
 * @property lastName
 * @property email
 * @property rank
 * @property created_at
 * @property updated_at
 */
class Employe extends Model
{
    protected $fillable = ['name','lastName','email','rank'];
    protected $dates = ['created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    
}
