<?php
require_once __DIR__ . '/../classes/Library.php';
require_once __DIR__ . '/../classes/Loan.php';

class LoanController {
    private $library;

    public function __construct() {
        $this->library = new Library();
    }

    public function loanBook($userId, $bookId) {
        $book = $this->library->getBookById($bookId);
        if ($book && $book['existence'] > 0) {
            $loan_date = date('Y-m-d');
            $return_date = date('Y-m-d', strtotime('+14 days')); // 14 dias de plazo en prestamo
            $loan = new Loan($userId, $bookId, $loan_date, $return_date);
            $this->library->addLoan($loan);
            $this->library->decreaseBookExistence($bookId);
        }
    }

    public function getLoansByUserId($userId) {
        return $this->library->getLoansByUserId($userId);
    }

    public function getAllLoans() {
        return $this->library->getAllLoans();
    }
}