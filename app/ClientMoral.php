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

    /**
     * Un client moral a plusieurs comptes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comptes()
    {
        return $this->hasMany('App\Compte');
    }

    public function employers()
    {
        return $this->hasMany('App\ClientPhysique');
    }
}
