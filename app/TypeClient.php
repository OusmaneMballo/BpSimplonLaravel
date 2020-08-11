<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClient extends Model
{
    protected $fillable=array('libelle');
    public $rules=array('libelle'=>'required|string');
}
