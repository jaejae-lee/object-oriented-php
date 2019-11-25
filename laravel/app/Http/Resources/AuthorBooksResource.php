<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorBooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "books" => $this->books,
            // "books" => cleanBooks($this->books),
        ];
    }

    //  public function cleanBooks($books){
    //     $cleanbooks = $books.filter(val => "title" or "pages");

    //     
    // }
}
