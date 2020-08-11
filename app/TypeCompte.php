<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCompte extends Model
{
    protected $fillable=array('libelle');
    public static $rules=array('libelle'=>'required|string');
}
