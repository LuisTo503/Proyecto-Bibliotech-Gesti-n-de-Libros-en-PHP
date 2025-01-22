<?php

class Book {
    public $id;
    public $book_title;
    public $author;
    public $category;
    public $year_of_publication;
    public $isbn;
    public $existence;

    public function __construct($id, $book_title, $author, $category, $year_of_publication, $isbn, $existence) {
        $this->id = $id;
        $this->book_title = $book_title;
        $this->author = $author;
        $this->category = $category;
        $this->year_of_publication = $year_of_publication;
        $this->isbn = $isbn;
        $this->existence = $existence;
    }
}