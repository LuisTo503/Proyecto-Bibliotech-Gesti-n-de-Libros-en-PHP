# Sistema de Gestión de Biblioteca

Este es un sistema de gestión de biblioteca desarrollado en PHP. Permite a los administradores gestionar libros, autores y categorías, y a los estudiantes buscar y prestar libros.

## Funcionalidades

- **Inicio de Sesión**: Los administradores y estudiantes pueden iniciar sesión en el sistema.
- **Gestión de Libros**: Los administradores pueden agregar, editar y eliminar libros.
- **Gestión de Autores**: Los administradores pueden agregar, editar y eliminar autores.
- **Gestión de Categorías**: Los administradores pueden agregar, editar y eliminar categorías.
- **Préstamos de Libros**: Los estudiantes pueden buscar libros y realizar préstamos.
- **Devolución de Libros**: Los estudiantes pueden devolver libros prestados.
- **Vista de Préstamos**: Los administradores pueden ver los detalles de los préstamos.

## Estructura del Proyecto

```
library-management-system
├── src
│   ├── classes
│   │   ├── Book.php
│   │   ├── Author.php
│   │   ├── Category.php
│   │   ├── Library.php
│   │   └── Loan.php
│   ├── controllers
│   │   ├── BookController.php
│   │   ├── AuthorController.php
│   │   ├── CategoryController.php
│   │   └── LoanController.php
│   └── json
│       ├── books.json
│       └── loans.json
├── public
│   ├── css
│   │   └── styles.css
│   ├── img
│   │   └── hero-image.jpg
│   ├── js
│   │   └── scripts.js
│   ├── addBook.php
│   ├── adminBooks.php
│   ├── deleteBook.php
│   ├── editBook.php
│   ├── finishLoans.php
│   ├── header.php
│   ├── index.php
│   ├── increaseExistence.php
│   ├── listBooks.php
│   ├── loanBook.php
│   ├── loginAdmin.php
│   ├── loginStudent.php
│   └── footer.php
├── README.md
└── config.php
```

´´´
Explicación
src: Contiene las clases y controladores del proyecto.

classes: Clases principales como Book.php, Author.php, Category.php, Library.php, y Loan.php.
controllers: Controladores para manejar la lógica de negocio, como BookController.php, AuthorController.php, CategoryController.php, y LoanController.php.
json: Archivos JSON para almacenar datos, como books.json y loans.json.
public: Contiene los archivos accesibles públicamente.

css: Archivos de estilos CSS.
img: Imágenes utilizadas en el proyecto.
js: Archivos JavaScript.
PHP files: Archivos PHP para diferentes funcionalidades como addBook.php, adminBooks.php, deleteBook.php, editBook.php, finishLoans.php, header.php, index.php, increaseExistence.php, listBooks.php, loanBook.php, loginAdmin.php, loginStudent.php, y footer.php.
README.md: Archivo de documentación del proyecto.

config.php: Archivo de configuración del proyecto.
´´´

## Requisitos

- PHP 8
- Bootstrap 5.3.3

## Instalación

1. Clona el repositorio en tu máquina local.
2. Navega a la carpeta del proyecto.
3. Ejecuta `composer install` para instalar las dependencias.
4. Configura tu servidor web para apuntar a la carpeta `public`.

## Uso

### Administrador

1. Inicia sesión como administrador en `loginAdmin.php`.
2. Accede al panel de administración para gestionar libros, autores y categorías.
3. Visualiza los préstamos actuales y los detalles de los préstamos.

### Estudiante

1. Inicia sesión como estudiante en `loginStudent.php`.
2. Busca libros disponibles y realiza préstamos.
3. Visualiza los libros prestados y realiza devoluciones.

## Estructura del Proyecto

- [public](http://_vscodecontentref_/3): Contiene los archivos accesibles públicamente, como `index.php`, `loginAdmin.php`, `loginStudent.php`, etc.
- [classes](http://_vscodecontentref_/4): Contiene las clases del proyecto, como `Book.php`, `Author.php`, `Category.php`, `Library.php`, etc.
- [controllers](http://_vscodecontentref_/5): Contiene los controladores del proyecto, como `BookController.php`, `AuthorController.php`, `CategoryController.php`, `LoanController.php`.
- [json](http://_vscodecontentref_/6): Contiene los archivos JSON para almacenar datos, como `books.json` y `loans.json`.
- [img](http://_vscodecontentref_/7): Contiene las imágenes utilizadas en el proyecto, como `hero-image.jpg`.

## Contribución

Si deseas contribuir a este proyecto, por favor sigue los siguientes pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz commit (`git commit -am 'Agrega nueva característica'`).
4. Sube tus cambios a la rama (`git push origin feature/nueva-caracteristica`).
5. Abre un Pull Request.

## Creado por y para

Alumno: Luis Tobar 2464 | Bootcamp INCAF-FSJ-24-A | ACtividad #1 Semana 1 | Proyecto Bibliotech: Gestión de Libros en PHP

## Licencia

Este proyecto está bajo la Licencia MIT.
