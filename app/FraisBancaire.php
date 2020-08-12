<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FraisBancaire extends Model
{
    protected $fillable=array('frais','date');

    public static $rules=array('frais'=>'required|float',
                                'date'=>'required|string');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeFrais()
    {
        return $this->belongsTo('App\TypeFrais');
    }

    /**
     * Chaque frais est applique sur un seul compte
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compte()
    {
        return $this->belongsTo('App\Compte');
    }
}
