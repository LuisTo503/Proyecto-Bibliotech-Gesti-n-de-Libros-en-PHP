<?php

class Library {
    private $books;
    private $loans;

    public function __construct() {
        $this->loadBooks();
        $this->loadLoans();
    }

    public function getAllBooks() {
        return $this->books;
    }

    public function getBookById($id) {
        foreach ($this->books as $book) {
            if ($book['id'] == $id) {
                return $book;
            }
        }
        return null;
    }

    public function addBook($book) {
        $this->books[] = $book;
        $this->saveBooks();
        return "Success: Book added";
    }

    public function editBook($id, $data) {
        foreach ($this->books as &$book) {
            if ($book['id'] == $id) {
                $book['book_title'] = $data['book_title'];
                $book['author'] = $data['author'];
                $book['category'] = $data['category'];
                $book['year_of_publication'] = $data['year_of_publication'];
                $book['isbn'] = $data['isbn'];
                $book['existence'] = $data['existence'];
                $this->saveBooks();
                return "Success: Book edited";
            }
        }
        return "Error: Book not found";
    }

    public function deleteBook($id) {
        foreach ($this->books as $key => $book) {
            if ($book['id'] == $id) {
                unset($this->books[$key]);
                $this->saveBooks();
                return "Success: Book deleted";
            }
        }
        return "Error: Book not found";
    }

    public function getLoansByUserId($userId) {
        $userLoans = [];
        foreach ($this->loans as $loan) {
            if ($loan['user_id'] == $userId) {
                $book = $this->getBookById($loan['book_id']);
                if ($book) {
                    $userLoans[] = $book;
                }
            }
        }
        return $userLoans;
    }

    public function getAllLoans() {
        return $this->loans;
    }

    public function addLoan($loan) {
        $this->loans[] = $loan;
        $this->saveLoans();
    }

    public function decreaseBookExistence($id) {
        foreach ($this->books as &$book) {
            if ($book['id'] == $id) {
                $book['existence']--;
                $this->saveBooks();
                return true;
            }
        }
        return false;
    }

    public function increaseBookExistence($id, $amount) {
        foreach ($this->books as &$book) {
            if ($book['id'] == $id) {
                $book['existence'] += $amount;
                $this->saveBooks();
                return true;
            }
        }
        return false;
    }

    private function loadBooks() {
        $this->books = json_decode(file_get_contents(__DIR__ . '/../json/books.json'), true);
    }

    private function saveBooks() {
        file_put_contents(__DIR__ . '/../json/books.json', json_encode($this->books, JSON_PRETTY_PRINT));
    }

    private function loadLoans() {
        $this->loans = json_decode(file_get_contents(__DIR__ . '/../json/loans.json'), true);
    }

    private function saveLoans() {
        file_put_contents(__DIR__ . '/../json/loans.json', json_encode($this->loans, JSON_PRETTY_PRINT));
    }
}