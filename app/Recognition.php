<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recognition extends Model
{
    public $timestamps = false;
    public $table = "recognition";
    protected $fillable = ['path'];
}
