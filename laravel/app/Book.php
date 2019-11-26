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

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

    public static function fromStrings(array $strings)
    {
        return collect($strings)->map(function ($string){
        return trim($string);
        })->map(function ($string) {
        // check if it's in the database
        $book = Book::where("title", $string)->first();
        // if tag exists return it, otherwise create a new one
        return $book;
        });
    }

    public static function fromIDs(array $ids)
    {
        return collect($ids)->map(function ($id) {
        // check if it's in the database
        $book = Book::find($id);
        // if book exists return it, otherwise create a new one
        return $book;
        });
    }

  
}
