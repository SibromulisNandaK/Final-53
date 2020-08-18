<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'Pertanyaan';
    protected $fillable = ['judul', 'isi', 'user_id', 'jawaban_tepat_id', 'poin'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jawaban()
    {
        return $this->hasMany('App\Jawaban');
    }
}
