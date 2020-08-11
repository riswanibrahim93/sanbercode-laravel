<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    //
    protected $table = 'pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;
}
