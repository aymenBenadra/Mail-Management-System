<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = ['sender', 'receiver', 'subject', 'corps', 'comments', 'object', 'treater', 'urgency', 'status', 'receptionDate'];
}
