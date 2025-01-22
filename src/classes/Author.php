<?php
// Clase Autor para gestionar la información de los autores
class Author {
    private $id;
    private $name;

    // Constructor para inicializar el autor
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    // Método para obtener el ID del autor
    public function getId() {
        return $this->id;
    }

    // Método para obtener el nombre del autor
    public function getName() {
        return $this->name;
    }

    // Método para establecer el nombre del autor
    public function setName($name) {
        $this->name = $name;
    }

    // Método para agregar un nuevo autor
    public function addAuthor($authorData) {
        // Lógica para agregar un autor
    }

    // Método para editar un autor existente
    public function editAuthor($authorData) {
        // Lógica para editar un autor
    }

    // Método para eliminar un autor
    public function deleteAuthor($id) {
        // Lógica para eliminar un autor
    }

    // Método para buscar autores
    public function searchAuthors($criteria) {
        // Lógica para buscar autores
    }
}
?>