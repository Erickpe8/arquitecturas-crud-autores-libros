# 🧩 Arquitectura: Repository Pattern

## 🧠 Descripción General

**Repository Pattern** es un patrón de diseño que actúa como una capa intermedia entre la lógica de negocio y el acceso a datos. Su objetivo principal es **abstraer la lógica de persistencia**, proporcionando una interfaz coherente y desacoplada para interactuar con el almacenamiento de datos, como bases de datos.

En esta arquitectura, los controladores no acceden directamente a Eloquent u ORM, sino que dependen de **interfaces** que representan acciones como `find`, `all`, `create`, `update` y `delete`. Luego, esas interfaces son implementadas por clases concretas (por ejemplo, usando Eloquent), lo que facilita el mantenimiento y la posibilidad de cambiar el sistema de persistencia en el futuro.

Esta implementación aporta ventajas como:
- Menor acoplamiento entre la lógica de presentación y los detalles de la base de datos.
- Mayor capacidad de realizar **tests unitarios**, al poder simular repositorios.
- Mejor organización del código y centralización del acceso a datos.

---

## 🧩 Funciones de Cada Capa

- **Models:** Representan las entidades de la base de datos.
- **Controllers:** Coordinan la entrada del usuario con los servicios y vistas.
- **Repositories (Interfaces):** Definen contratos para las operaciones con datos.
- **Repositories (Eloquent):** Implementan los métodos definidos en las interfaces usando ORM.
- **Views:** Representan la interfaz que visualiza el usuario final.

---

# 📚 Estructura de carpetas

## 📂 app/Http/Controllers

| Archivo                | Función                                                                 |
|------------------------|-------------------------------------------------------------------------|
| `AutorController.php`  | Controlador de autores que delega operaciones al repositorio.           |
| `LibroController.php`  | Controlador de libros que coordina vistas y lógica con repositorios.    |
| `Controller.php`       | Controlador base común a todos.                                         |

---

## 📂 app/Models

| Archivo         | Función                                                  |
|-----------------|-----------------------------------------------------------|
| `Autor.php`     | Modelo que representa la entidad Autor usando Eloquent.   |
| `Libro.php`     | Modelo para la entidad Libro con relación a autor.        |

---

## 📂 app/Repositories/Interfaces

| Archivo                         | Función                                                                 |
|----------------------------------|--------------------------------------------------------------------------|
| `AutorRepositoryInterface.php`  | Declara métodos como `all`, `find`, `create`, `update`, `delete` para autores. |
| `LibroRepositoryInterface.php`  | Contrato para la gestión de libros.                                     |

---

## 📂 app/Repositories/Eloquent

| Archivo                     | Función                                                                       |
|-----------------------------|--------------------------------------------------------------------------------|
| `AutorRepository.php`       | Implementa `AutorRepositoryInterface` usando Eloquent.                        |
| `LibroRepository.php`       | Implementa `LibroRepositoryInterface` con ORM Eloquent.                       |

---

## 📂 resources/views/autores

| Archivo                | Función                                          |
|------------------------|--------------------------------------------------|
| `index.blade.php`      | Lista de autores.                                |
| `create.blade.php`     | Formulario para registrar un nuevo autor.        |
| `edit.blade.php`       | Edición de un autor existente.                   |

---

## 📂 resources/views/libros

| Archivo                | Función                                          |
|------------------------|--------------------------------------------------|
| `index.blade.php`      | Vista con listado de libros.                     |
| `create.blade.php`     | Formulario para añadir un nuevo libro.           |
| `edit.blade.php`       | Formulario para modificar libro existente.       |

---

# ✅ Ventajas

- Separa la lógica de acceso a datos de los controladores.
- Facilita la inyección de dependencias y pruebas unitarias.
- Permite cambiar la fuente de datos sin alterar otras capas.
- Centraliza las consultas, lo que mejora el mantenimiento del código.

---

## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
