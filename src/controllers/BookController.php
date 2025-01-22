<?php
require_once __DIR__ . '/../classes/Library.php';
require_once __DIR__ . '/../classes/Book.php';

class BookController {
    private $library;

    public function __construct() {
        $this->library = new Library();
    }

    public function getAllBooks() {
        return $this->library->getAllBooks();
    }

    public function getBookById($id) {
        return $this->library->getBookById($id);
    }

    public function addBook($data) {
        $book = new Book($data['id'], $data['book_title'], $data['author'], $data['category'], $data['year_of_publication'], $data['isbn'], $data['existence']);
        return $this->library->addBook($book);
    }

    public function editBook($id, $data) {
        return $this->library->editBook($id, $data);
    }

    public function deleteBook($id) {
        return $this->library->deleteBook($id);
    }
}