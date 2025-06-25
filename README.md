# 🧩 Arquitectura: Service Layer

## 🧠 Descripción General

**Service Layer** es un patrón arquitectónico que introduce una capa intermedia entre los controladores y la lógica de acceso a datos, conocida como “servicio”. Su objetivo es **centralizar la lógica de negocio** en clases independientes, dejando a los controladores únicamente con la responsabilidad de manejar solicitudes HTTP.

A través de este patrón, se evita repetir lógica en múltiples controladores o lugares del proyecto. En lugar de eso, se crea una **clase de servicio** por entidad (por ejemplo, `AutorService`, `LibroService`), que contiene métodos como `crearAutor`, `actualizarLibro`, etc.

En este proyecto CRUD, el patrón nos permite:
- Tener una única fuente de verdad para la lógica de negocio.
- Mejorar la organización y reutilización del código.
- Facilitar pruebas unitarias a nivel de negocio.
- Evitar controladores demasiado grandes o cargados de lógica innecesaria.

---

## 🧩 Funciones de Cada Capa

- **Controllers:** Reciben peticiones y delegan a los servicios.
- **Services:** Contienen toda la lógica de negocio (crear, editar, eliminar, buscar, etc.).
- **Repositories (Interfaces + Eloquent):** Se encargan del acceso a datos.
- **Models:** Representan las entidades de la base de datos.
- **Views:** Interfaz de usuario que consume los datos.

---

# 📚 Estructura de carpetas

## 📂 app/Http/Controllers

| Archivo                | Función                                                                 |
|------------------------|-------------------------------------------------------------------------|
| `AutorController.php`  | Controlador que delega operaciones al servicio de autor.                |
| `LibroController.php`  | Controlador que redirige la lógica al servicio de libros.               |
| `Controller.php`       | Controlador base común para otros controladores.                        |

---

## 📂 app/Models

| Archivo         | Función                                                  |
|------------------|----------------------------------------------------------|
| `Autor.php`     | Modelo Eloquent que representa la tabla de autores.       |
| `Libro.php`     | Modelo Eloquent para libros, con relación al autor.       |

---

## 📂 app/Repositories/Interfaces

| Archivo                         | Función                                                                  |
|----------------------------------|---------------------------------------------------------------------------|
| `AutorRepositoryInterface.php`  | Define los métodos que el repositorio de autores debe implementar.       |
| `LibroRepositoryInterface.php`  | Define las operaciones del repositorio de libros.                        |

---

## 📂 app/Repositories/Eloquent

| Archivo                     | Función                                                                 |
|-----------------------------|--------------------------------------------------------------------------|
| `AutorRepository.php`       | Implementación de la interfaz de repositorio para autores usando Eloquent. |
| `LibroRepository.php`       | Implementación para libros con ORM Eloquent.                             |

---

## 📂 app/Services

| Archivo             | Función                                                                      |
|---------------------|-------------------------------------------------------------------------------|
| `AutorService.php`  | Contiene la lógica de negocio relacionada a la entidad Autor.                |
| `LibroService.php`  | Administra las operaciones clave del dominio Libro.                          |

---

## 📂 resources/views/autores

| Archivo                | Función                                                   |
|------------------------|------------------------------------------------------------|
| `index.blade.php`      | Lista todos los autores registrados.                       |
| `create.blade.php`     | Formulario para crear un nuevo autor.                      |
| `edit.blade.php`       | Formulario para editar un autor existente.                 |

---

## 📂 resources/views/libros

| Archivo                | Función                                                   |
|------------------------|------------------------------------------------------------|
| `index.blade.php`      | Muestra todos los libros disponibles.                      |
| `create.blade.php`     | Permite registrar un nuevo libro.                          |
| `edit.blade.php`       | Formulario para actualizar la información de un libro.     |

---

# ✅ Ventajas

- Centraliza y reutiliza la lógica de negocio.
- Facilita la lectura, pruebas y mantenimiento del sistema.
- Evita duplicación de lógica entre controladores.
- Promueve una arquitectura más limpia y desacoplada.

---

## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨


