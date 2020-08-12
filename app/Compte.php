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

    /**
     * Chaque compte un seul type
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCompte()
    {
        return $this->belongsTo('App\TypeCompte');
    }

    /**
     * Un compte peut avoir plusieurs frais-bancaire
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fraisBancaire()
    {
        return $this->hasMany('App\FraisBancaire');
    }

    /**
     * Un compte appartient a un client moral
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientMoral()
    {
        return $this->belongsTo('App\ClientMoral');
    }

    /**
     * Un compte appartient a un client physique
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientPhysique()
    {
        return $this->belongsTo('App\ClientPhysique');
    }
}
