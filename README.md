# 🧱 Arquitectura: DDD (Domain-Driven Design)

## 🧠 Descripción General

**Domain-Driven Design (DDD)** es una filosofía de desarrollo de software que pone el **modelo del dominio** en el centro de toda la arquitectura. Esto significa que toda la lógica del negocio se organiza, diseña y codifica a partir de una comprensión profunda del dominio de la aplicación.

En este enfoque, el código se estructura alrededor del conocimiento del negocio, dividiendo el sistema por **contextos** y aislando la lógica en **entidades**, **servicios de dominio**, y **repositorios**, con los **casos de uso** sirviendo de puente entre el dominio y las interfaces externas (como controladores o bases de datos).

En nuestro CRUD de autores y libros, aplicar DDD nos permite:
- Reflejar mejor la lógica del negocio en el código.
- Dividir el sistema por **subdominios** (Autor, Libro), facilitando el trabajo modular.
- Aumentar la mantenibilidad del código gracias a la **separación de responsabilidades**.
- Hacer el sistema más comprensible y escalable al crecer en complejidad.

## 🧩 Funciones de Cada Capa

- **Application (Casos de uso):** Define lo que el sistema puede hacer (crear, listar, actualizar, etc.).
- **Domain (Modelo de negocio):** Contiene las entidades, repositorios e invariantes del negocio.
- **Infrastructure (Persistencia):** Conecta el dominio con detalles técnicos (bases de datos, Eloquent, etc.).
- **Interfaces (Web):** Interfaz de entrada: controladores, peticiones HTTP y vistas.

---

# 📚 Estructura de carpetas

## 🧠 Application Layer (Casos de uso)

### 📂 app/Application/Autor/UseCases

| Archivo             | Función                                                          |
|---------------------|------------------------------------------------------------------|
| `CreateAutor.php`   | Lógica para crear un nuevo autor.                               |
| `DeleteAutor.php`   | Encapsula la eliminación de un autor.                           |
| `FindAutor.php`     | Obtiene un autor específico por su ID.                          |
| `ListAutores.php`   | Devuelve la lista completa de autores.                          |
| `UpdateAutor.php`   | Actualiza los datos de un autor existente.                      |

### 📂 app/Application/Libro/UseCases

| Archivo             | Función                                                          |
|---------------------|------------------------------------------------------------------|
| `CreateLibro.php`   | Lógica para registrar un nuevo libro.                           |
| `DeleteLibro.php`   | Borra un libro según su ID.                                     |
| `FindLibro.php`     | Devuelve un libro específico.                                   |
| `ListLibros.php`    | Lista todos los libros en el sistema.                           |
| `UpdateLibro.php`   | Actualiza los datos de un libro.                                |

---

## 🧩 Domain Layer

### 📂 app/Domain/Autor/Models

| Archivo        | Función                                                 |
|----------------|----------------------------------------------------------|
| `Autor.php`    | Entidad que representa el modelo de Autor.               |

### 📂 app/Domain/Autor/Repositories

| Archivo                          | Función                                                             |
|----------------------------------|----------------------------------------------------------------------|
| `AutorRepositoryInterface.php`  | Define los métodos requeridos para manejar los datos de Autor.      |

### 📂 app/Domain/Autor/Services

| Archivo           | Función                                                                 |
|-------------------|-------------------------------------------------------------------------|
| `AutorService.php`| Contiene reglas de negocio específicas para la entidad Autor.           |

---

### 📂 app/Domain/Libro/Models

| Archivo        | Función                                                |
|----------------|---------------------------------------------------------|
| `Libro.php`    | Entidad que representa el modelo de Libro.             |

### 📂 app/Domain/Libro/Repositories

| Archivo                          | Función                                                             |
|----------------------------------|----------------------------------------------------------------------|
| `LibroRepositoryInterface.php`  | Define las operaciones que deben implementar los repositorios.     |

### 📂 app/Domain/Libro/Services

| Archivo           | Función                                                                |
|-------------------|------------------------------------------------------------------------|
| `LibroService.php`| Lógica de negocio del dominio relacionada con los libros.              |

---

## 🏗️ Infrastructure Layer

### 📂 app/Infrastructure/Persistence/Repositories

| Archivo                         | Función                                                              |
|----------------------------------|-----------------------------------------------------------------------|
| `EloquentAutorRepository.php`   | Implementa la persistencia del repositorio de autores usando Eloquent.|
| `EloquentLibroRepository.php`   | Implementa la persistencia del repositorio de libros con Eloquent.    |

---

## 🌐 Interfaces (Web)

### 📂 app/Interfaces/Web/Controllers

| Archivo              | Función                                                                 |
|-----------------------|-------------------------------------------------------------------------|
| `AutorController.php` | Controlador HTTP para operaciones sobre autores.                        |
| `LibroController.php` | Controlador HTTP para operaciones sobre libros.                         |

---

# ✅ Ventajas

- Centra la lógica en el dominio, facilitando el entendimiento del negocio.
- Escalabilidad al dividir el sistema por contextos bien definidos.
- Permite realizar pruebas unitarias fácilmente al separar lógica y persistencia.
- Ideal para sistemas con reglas de negocio complejas.

---

## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨

