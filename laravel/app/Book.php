<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "pages", "published", "ISBN", "rating", "author_id"];

    public function author()
    {
      // a comment belongs to an article
      return $this->belongsTo(Author::class);
    }
  
}
