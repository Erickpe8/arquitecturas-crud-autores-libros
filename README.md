# ⚔️ Arquitectura: CQRS (Command Query Responsibility Segregation)

## 🧠 Descripción General

**CQRS** (Segregación de Responsabilidad de Comando y Consulta) es un patrón arquitectónico que propone separar de forma explícita las responsabilidades de **lectura** (queries) y **escritura** (commands) dentro de una aplicación. A diferencia de una arquitectura tradicional donde un único modelo gestiona tanto las operaciones de lectura como de escritura, CQRS establece una división estructural clara entre ambas.

Esta separación permite optimizar cada parte de la lógica del sistema según su necesidad. Por ejemplo, las **queries** pueden enfocarse exclusivamente en obtener y proyectar datos, mientras que los **commands** se encargan de modificar el estado del sistema siguiendo reglas de negocio bien definidas.

En nuestro proyecto CRUD, la arquitectura CQRS nos ayuda a:
- Mantener un código más organizado y enfocado en una sola responsabilidad por archivo.
- Facilitar la escalabilidad del sistema, ya que podemos escalar consultas y comandos de forma independiente.
- Mejorar la trazabilidad de las operaciones, porque cada acción (crear, actualizar, eliminar) se encapsula en su propio comando.
- Promover una mejor separación de capas, permitiendo que los casos de uso se alineen con las reglas de negocio sin contaminarse con lógica de presentación o persistencia.

Este patrón es especialmente útil en sistemas donde las operaciones de lectura son significativamente más frecuentes o complejas que las de escritura, o en proyectos que requieren trazabilidad clara y separación estricta de responsabilidades.

## 🧩 Funciones de Cada Capa

- **Commands (escritura)**: Contienen la lógica para crear, actualizar o eliminar datos.
- **Queries (lectura)**: Encargados de obtener y devolver datos al sistema sin modificarlos.
- **Controllers**: Redireccionan cada operación al comando o consulta correspondiente.
- **Repository Interface & Implementation**: Mantienen la conexión con la base de datos según cada acción.

---

# 📚 Estructura de carpetas

## 🧠 Application Layer (Casos de uso)

### 📂 app/Application/Autor/Commands

| Archivo             | Función                                                                 | Relación                                 |
|---------------------|-------------------------------------------------------------------------|-------------------------------------------|
| `CreateAutor.php`   | Crea un nuevo autor en la base de datos.                               | Usado por el método `store` del controller. |
| `UpdateAutor.php`   | Actualiza los datos de un autor existente.                             | Usado por el método `update`.              |
| `DeleteAutor.php`   | Elimina un autor mediante su ID.                                       | Usado por el método `destroy`.             |

### 📂 app/Application/Autor/Queries

| Archivo             | Función                                                                 | Relación                                 |
|---------------------|-------------------------------------------------------------------------|-------------------------------------------|
| `ListAutores.php`   | Retorna la lista de todos los autores.                                 | Usado por el método `index`.              |
| `FindAutor.php`     | Busca y retorna un autor específico por ID.                            | Usado por el método `edit`.               |

---

### 📂 app/Application/Libro/Commands

| Archivo             | Función                                                                 | Relación                                 |
|---------------------|-------------------------------------------------------------------------|-------------------------------------------|
| `CreateLibro.php`   | Crea un nuevo libro asociado a un autor.                               | Usado por el método `store`.              |
| `UpdateLibro.php`   | Actualiza información de un libro.                                     | Usado por el método `update`.             |
| `DeleteLibro.php`   | Elimina un libro por ID.                                               | Usado por el método `destroy`.            |

### 📂 app/Application/Libro/Queries

| Archivo             | Función                                                                 | Relación                                 |
|---------------------|-------------------------------------------------------------------------|-------------------------------------------|
| `ListLibros.php`    | Lista todos los libros con sus autores.                                | Usado por el método `index`.              |
| `FindLibro.php`     | Encuentra un libro específico.                                         | Usado por el método `edit`.               |

---

## 🧩 Domain Layer

### 📂 app/Domain/Contracts

| Archivo                     | Función                                                            |
|-----------------------------|---------------------------------------------------------------------|
| `AutorRepositoryInterface` | Define los métodos que deben implementar los repositorios de autor. |
| `LibroRepositoryInterface` | Define los métodos que deben implementar los repositorios de libro. |

### 📂 app/Domain/Entities

| Archivo         | Función                                               |
|------------------|--------------------------------------------------------|
| `Autor.php`     | Representa el modelo Eloquent del autor.               |
| `Libro.php`     | Representa el modelo Eloquent del libro. Incluye relación con autor. |

### 📂 app/Domain/Services

| Archivo             | Función                                                       |
|---------------------|----------------------------------------------------------------|
| `AutorService.php`  | Encapsula lógica de negocio compleja relacionada con autores.  |
| `LibroService.php`  | Encapsula lógica de negocio compleja relacionada con libros.   |

---

## 🏗️ Infrastructure Layer

### 📂 app/Infrastructure/Adapters/Persistence

| Archivo                         | Función                                                                  |
|----------------------------------|---------------------------------------------------------------------------|
| `EloquentAutorRepository.php`   | Implementa `AutorRepositoryInterface` usando Eloquent ORM.               |
| `EloquentLibroRepository.php`   | Implementa `LibroRepositoryInterface` usando Eloquent ORM.               |

---

## 🌐 Interfaces (Controllers)

### 📂 app/Interfaces/Web/Controllers

| Archivo              | Función                                                                 |
|-----------------------|-------------------------------------------------------------------------|
| `AutorController.php` | Maneja las vistas y peticiones HTTP para autores (index, store, etc.). |
| `LibroController.php` | Maneja las vistas y peticiones HTTP para libros.                        |

---


# ✅ Ventajas

- Separa responsabilidades, lo que mejora la organización del código.
- Permite optimizar las lecturas y escrituras por separado.
- Facilita el escalado independiente de queries y commands.
- Mejora la mantenibilidad en sistemas grandes.


# Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
