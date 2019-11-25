<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    protected $fillable = ["title", "artist","published", "category", "single"];
}
