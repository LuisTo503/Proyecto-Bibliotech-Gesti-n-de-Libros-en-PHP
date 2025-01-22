<?php
// src/controllers/CategoryController.php

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function addCategory($name) {
        // Lógica para agregar una nueva categoría
        return $this->categoryModel->add($name);
    }

    public function editCategory($id, $newName) {
        // Lógica para editar una categoría existente
        return $this->categoryModel->edit($id, $newName);
    }

    public function deleteCategory($id) {
        // Lógica para eliminar una categoría
        return $this->categoryModel->delete($id);
    }

    public function searchCategory($name) {
        // Lógica para buscar categorías por nombre
        return $this->categoryModel->search($name);
    }
}
