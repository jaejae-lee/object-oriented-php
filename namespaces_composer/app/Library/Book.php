<?php
namespace App\Library;

class Book
{
    private $title;
    private $pages;
    private $read = 0;
    private $currentPage = 1;

    public function __construct($title, $pages)
    {
        $this->title = $title;
        $this->pages = $pages;
    }

    public function read($read)
    {
        return $this->read = $read;
        // return $this;
    }

    public function currentPage()
    {
       return $this->currentPage += $this->read;
    //    return $this;
    }

    public function title()
    {
        return $this->title;
    }

}