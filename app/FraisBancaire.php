<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisBancaire extends Model
{
    protected $fillable=array('frais','date');
    public static $rules=array('frais'=>'required|float',
                                'date'=>'required|string');
}
