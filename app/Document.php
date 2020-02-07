<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['courrier_id', 'filename'];

    public function courrier()
    {
        return $this->belongsTo('App\Courrier');
    }
}
