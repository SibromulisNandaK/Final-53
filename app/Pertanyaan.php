<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'Pertanyaan';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
