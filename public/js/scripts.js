// Este archivo contiene la funcionalidad JavaScript para la gestión de libros en la biblioteca.

// Función para buscar libros
function buscarLibros() {
    const titulo = document.getElementById('titulo').value;
    const autor = document.getElementById('autor').value;
    const categoria = document.getElementById('categoria').value;

    // Lógica para buscar libros en la base de datos
    // Aquí se puede hacer una llamada AJAX para obtener los resultados
}

// Función para prestar un libro
function prestarLibro(libroId) {
    // Lógica para prestar un libro
    // Aquí se puede hacer una llamada AJAX para registrar la transacción
}

// Función para agregar un nuevo libro
function agregarLibro() {
    const nuevoLibro = {
        titulo: document.getElementById('nuevoTitulo').value,
        autor: document.getElementById('nuevoAutor').value,
        categoria: document.getElementById('nuevaCategoria').value,
        year: document.getElementById('nuevoYear').value,
        isbn: document.getElementById('nuevoIsbn').value,
        existencia: document.getElementById('nuevaExistencia').value
    };

    // Lógica para agregar el libro a la base de datos
    // Aquí se puede hacer una llamada AJAX para guardar el nuevo libro
}

// Función para editar un libro existente
function editarLibro(libroId) {
    const libroEditado = {
        id: libroId,
        titulo: document.getElementById('tituloEditado').value,
        autor: document.getElementById('autorEditado').value,
        categoria: document.getElementById('categoriaEditada').value,
        year: document.getElementById('yearEditado').value,
        isbn: document.getElementById('isbnEditado').value,
        existencia: document.getElementById('existenciaEditada').value
    };

    // Lógica para actualizar el libro en la base de datos
    // Aquí se puede hacer una llamada AJAX para guardar los cambios
}

// Función para eliminar un libro
function eliminarLibro(libroId) {
    // Lógica para eliminar el libro
    // Aquí se puede hacer una llamada AJAX para eliminar el libro de la base de datos
}