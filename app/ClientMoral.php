<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientMoral extends Model
{
    protected $fillable=array('nom','raison_social','adresse','telephone',
                            'email','login','passwd','ninea');

    public static $rules=array('nom'=>'required|max:50','raison_social'=>'required|max:50',
                                'telephone'=>'required|max:15','email'=>'required|max:50',
                                'login'=>'required|max:30','passwwd'=>'required|max:30',
                                'ninea'=>'required|max:30');
}
