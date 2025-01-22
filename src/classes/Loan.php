<?php

class Loan {
    public $user_id;
    public $book_id;
    public $loan_date;
    public $return_date;

    public function __construct($user_id, $book_id, $loan_date, $return_date) {
        $this->user_id = $user_id;
        $this->book_id = $book_id;
        $this->loan_date = $loan_date;
        $this->return_date = $return_date;
    }
}