<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VotePertanyaan extends Model
{
    protected $table = 'vote_pertanyaan';
    protected $guarded = [];
    public $timestamps = false;
}
