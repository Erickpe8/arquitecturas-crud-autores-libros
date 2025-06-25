# 🧼 Arquitectura: Clean Architecture

## 🧠 Descripción General

**Clean Architecture** es un enfoque propuesto por Robert C. Martin (Uncle Bob) que busca una separación estricta entre las distintas capas del software, priorizando la independencia del dominio frente a frameworks, bases de datos o interfaces.

Su principio central es que **el código de negocio (dominio)** debe estar completamente desacoplado de las demás capas, permitiendo que pueda cambiar la base de datos, el framework o la interfaz sin afectar la lógica principal del sistema.

En nuestro CRUD de autores y libros, aplicar Clean Architecture nos permite:
- Garantizar una alta **independencia del framework (Laravel)**.
- Hacer que el dominio sea **reutilizable y fácil de testear**.
- Mejorar la **escalabilidad** y mantenimiento del sistema al estar cada parte organizada y separada.
- Aplicar los principios **SOLID** para mejorar la calidad del diseño.

## 🧩 Funciones de Cada Capa

- **Application (Casos de uso):** Contiene la lógica para ejecutar acciones específicas del sistema.
- **Domain (Núcleo del sistema):** Modela el negocio: entidades, servicios de dominio, interfaces de repositorios.
- **Infrastructure (Persistencia):** Implementa la lógica de acceso a datos, conectando con la base de datos.
- **Interfaces (Web):** Define los controladores y vistas que se comunican con el usuario final.

---

# 📚 Estructura de carpetas

## 🧠 Application Layer (Casos de uso)

### 📂 app/Application/Autor/UseCases

| Archivo             | Función                                                                  |
|---------------------|--------------------------------------------------------------------------|
| `CreateAutor.php`   | Crea un nuevo autor.                                                     |
| `DeleteAutor.php`   | Elimina un autor por ID.                                                 |
| `FindAutor.php`     | Obtiene los datos de un autor específico.                                |
| `ListAutores.php`   | Retorna una lista de todos los autores registrados.                      |
| `UpdateAutor.php`   | Actualiza los datos de un autor.                                         |

### 📂 app/Application/Libro/UseCases

| Archivo             | Función                                                                  |
|---------------------|--------------------------------------------------------------------------|
| `CreateLibro.php`   | Crea un libro nuevo asociado a un autor.                                 |
| `DeleteLibro.php`   | Elimina un libro existente por su ID.                                    |
| `FindLibro.php`     | Busca un libro específico.                                               |
| `ListLibros.php`    | Lista todos los libros con su información asociada.                      |
| `UpdateLibro.php`   | Actualiza los datos de un libro.                                         |

---

## 🧩 Domain Layer

### 📂 app/Domain/Contracts

| Archivo                     | Función                                                                      |
|-----------------------------|-------------------------------------------------------------------------------|
| `AutorRepositoryInterface` | Define la interfaz para implementar los métodos de repositorio de autores.    |
| `LibroRepositoryInterface` | Define la interfaz para implementar los métodos de repositorio de libros.     |

### 📂 app/Domain/Entities

| Archivo         | Función                                                                |
|------------------|-------------------------------------------------------------------------|
| `Autor.php`     | Modelo de entidad del autor, con sus atributos y relaciones.           |
| `Libro.php`     | Modelo del libro con relación al autor, incluye sus atributos.         |

### 📂 app/Domain/Services

| Archivo             | Función                                                                          |
|---------------------|----------------------------------------------------------------------------------|
| `AutorService.php`  | Contiene lógica de negocio relevante para la entidad Autor.                      |
| `LibroService.php`  | Encapsula reglas específicas relacionadas con la gestión de Libros.              |

---

## 🏗️ Infrastructure Layer

### 📂 app/Infrastructure/Adapters/Persistence

| Archivo                         | Función                                                                 |
|----------------------------------|--------------------------------------------------------------------------|
| `EloquentAutorRepository.php`   | Implementa `AutorRepositoryInterface` usando Eloquent ORM.              |
| `EloquentLibroRepository.php`   | Implementa `LibroRepositoryInterface` usando Eloquent ORM.              |

---

## 🌐 Interfaces (Web)

### 📂 app/Interfaces/Web/Controllers

| Archivo              | Función                                                                  |
|-----------------------|--------------------------------------------------------------------------|
| `AutorController.php` | Recibe peticiones HTTP sobre autores y las dirige a los casos de uso.   |
| `LibroController.php` | Encargado de manejar las vistas y acciones relacionadas con los libros.  |

---

# ✅ Ventajas

- Mantiene el dominio completamente aislado del framework.
- Las reglas del negocio no dependen de Laravel, ni de Eloquent.
- Permite modificar detalles como la base de datos sin afectar la lógica de negocio.
- Organiza el código por responsabilidades, haciendo más fácil su mantenimiento.

---


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
