<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $guarded = [];
    protected $table = 'tags';
    // protected $primaryKey = 'id';
    public $timestamps = false;
}
