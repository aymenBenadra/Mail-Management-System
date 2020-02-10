<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['courrier_id', 'filepath', 'filename', 'type'];

    public function courrier()
    {
        return $this->belongsTo('App\Courrier','courrier_id', 'id');
    }
}
