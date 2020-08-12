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
                                'profession'=>'max:50','nci'=>'required|max:30');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeClient()
    {
        return $this->belongsTo('App\TypeClient');
    }

    /**
     * Un client physique a plusieurs comptes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comptes()
    {
        return $this->hasMany('App\Compte');
    }

    /**
     * Un client physique peut avoir un employeur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeur()
    {
        return $this->belongsTo('App\ClientMoral');
    }
}
