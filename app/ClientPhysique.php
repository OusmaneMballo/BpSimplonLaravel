<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPhysique extends Model
{
    protected $fillable=array('nom','prenom','salaire','adresse',
                            'telephone','email','login','passwd',
                            'profession','nci');

    public static $rules=array('nom'=>'required|max:30','prenom'=>'required|max:30',
                                'salaire'=>'float','telephone'=>'required|max:15','email'=>'required|max:100',
                                'login'=>'required|max:30','passwd'=>'required|max:30',
                                'nci'=>'required|max:30');

}
