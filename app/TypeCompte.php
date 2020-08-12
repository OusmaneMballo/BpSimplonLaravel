<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCompte extends Model
{
    protected $fillable=array('libelle');
    public static $rules=array('libelle'=>'required|string');

    /**
     * Un TypeCompte a plusieurs comptes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comptes()
    {
        return $this->hasMany('App\Compte');
    }
}
