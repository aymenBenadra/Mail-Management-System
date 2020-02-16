<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['courrier_id', 'filepath', 'filename', 'type'];

    /**
     * The relationship between the Courrier and the Document Model to get the root Courrier when needed.
     * 
     * @return Courrier courrier
     */
    public function courrier()
    {
        return $this->belongsTo('App\Courrier','courrier_id', 'id');
    }
}
