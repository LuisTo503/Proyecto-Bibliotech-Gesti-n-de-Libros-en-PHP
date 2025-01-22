<?php
require_once __DIR__ . '/../classes/Library.php';
require_once __DIR__ . '/../classes/Author.php';

class AuthorController {
    private $library;

    public function __construct() {
        $this->library = new Library();
    }

    public function addAuthor($data) {
        $author = new Author($data['id'], $data['name']);
        return $this->library->addAuthor($author);
    }

    public function editAuthor($id, $data) {
        return $this->library->editAuthor($id, $data);
    }

    public function deleteAuthor($id) {
        return $this->library->deleteAuthor($id);
    }

    public function searchAuthor($name) {
        return $this->library->searchAuthor($name);
    }
}