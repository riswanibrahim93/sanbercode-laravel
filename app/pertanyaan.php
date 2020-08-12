<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    //
    protected $table = 'pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'tanya_tags', 'pertanyaan_id', 'tag_id');
    }
}
