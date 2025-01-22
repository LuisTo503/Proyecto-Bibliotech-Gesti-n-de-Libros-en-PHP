<?php

class CategoryModel {
    private $categories;

    public function __construct() {
        $this->categories = json_decode(file_get_contents(__DIR__ . '/../json/categories.json'), true);
    }

    public function getAllCategories() {
        return $this->categories;
    }

    public function addCategory($category) {
        $this->categories[] = $category;
        $this->saveCategories();
    }

    public function saveCategories() {
        file_put_contents(__DIR__ . '/../json/categories.json', json_encode($this->categories));
    }
}