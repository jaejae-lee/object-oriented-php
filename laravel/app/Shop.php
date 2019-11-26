<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $timestamps = false;
    protected $fillable = ["name", "online"];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
