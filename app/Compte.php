<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable=array('numero','cle_rip','etat','solde',
                            'date_creat','date_ferm','date_ferm_tempo',
                            'date_reouvert');

    public static $rules=array('numero'=>'required|max:30','cle_rip'=>'required|max:30',
                                'etat'=>'required|max:10','solde'=>'required|float',
                                'date_creat'=>'required|max:20');

}
