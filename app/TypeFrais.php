<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFrais extends Model
{
    protected $fillable=array('libelle','frais');

    public static $rules=array('libelle'=>'required|string',
                                'frais'=>'required|float');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fraisBancaire()
    {
        return $this->hasMany('App\FraisBancaire');
    }
}
