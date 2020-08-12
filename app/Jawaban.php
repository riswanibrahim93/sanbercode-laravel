<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';
    protected $primaryKey = 'id_jawaban';
    public $timestamps = false;

    public function pertanyaan()
    {
        return $this->hasOne('App\pertanyaan','jawaban_id');
    }
}
