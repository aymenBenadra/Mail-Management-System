<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = ['expediteur', 'recepteur', 'sujet', 'corps', 'type', 'dateEnvoi', 'commentaires', 'objet', 'traiterPar', 'urgence', 'statut', 'dateReception', 'traitement'];

    public function documents()
    {
        return $this->hasMany('App\Document', 'courrier_id', 'id');
    }
}
