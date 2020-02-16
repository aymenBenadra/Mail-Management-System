<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['expediteur', 'recepteur', 'sujet', 'corps', 'type', 'dateEnvoi', 'commentaires', 'objet', 'traiterPar', 'urgence', 'statut', 'dateReception', 'traitement'];


    /**
     * The relationship between the Courrier and the Document Model to get the related documents when needed.
     * 
     * @return Document[] documents
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'courrier_id', 'id');
    }
}
