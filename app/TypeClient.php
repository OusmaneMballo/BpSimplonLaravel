<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClient extends Model
{
    protected $fillable=array('libelle');

    public static $rules=array('libelle'=>'required|string');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientPhysique()
    {
        return $this->hasMany('App\ClientPhysique');
    }
}
