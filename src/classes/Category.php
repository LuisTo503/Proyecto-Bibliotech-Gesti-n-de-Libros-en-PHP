<?php
// Clase para gestionar categorías de libros
class Category {
    private $id;
    private $name;

    // Constructor
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    // Método para obtener el ID de la categoría
    public function getId() {
        return $this->id;
    }

    // Método para obtener el nombre de la categoría
    public function getName() {
        return $this->name;
    }

    // Método para establecer el nombre de la categoría
    public function setName($name) {
        $this->name = $name;
    }

    // Método para convertir la categoría a un array
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
?>