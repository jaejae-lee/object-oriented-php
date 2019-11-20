<?php
namespace App\Library;

class Shelf
{
    private $books = [];

    public function addBook($book)
    {
        $this->books[] = array_push($this->books, $book);
        return $this;
    }

    public function titles()
    {
        $this->titles = array_map(function($title){
            return $title->getTitle();
        }, $titles);
    }

    public function getTitle()
    {
        return array_keys($this->books);
    }

}