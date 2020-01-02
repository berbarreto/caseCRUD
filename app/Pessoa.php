<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['firstName','lastName','gender','age','email','password'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'pessoas';
}
