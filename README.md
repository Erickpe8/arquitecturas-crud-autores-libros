# 🛡️ Arquitectura: Hexagonal (Ports and Adapters)

## 🧠 Descripción General

**Hexagonal Architecture**, también conocida como **Ports and Adapters**, es un enfoque arquitectónico que busca aislar el núcleo del negocio (dominio) de las tecnologías externas, como frameworks, bases de datos o interfaces de usuario.

Su principal objetivo es **permitir que la lógica de negocio no dependa de detalles técnicos**. Para lograr esto, la comunicación con el exterior se hace a través de **puertos (interfaces)**, mientras que las implementaciones específicas (adaptadores) se conectan a estos puertos sin afectar el corazón de la aplicación.

En este CRUD de autores y libros, aplicar Hexagonal nos permite:
- Separar completamente el dominio de la infraestructura (como Eloquent o Laravel).
- Facilitar el cambio de tecnologías sin afectar la lógica de negocio.
- Tener una arquitectura más testeable y mantenible a largo plazo.
- Lograr una verdadera inversión de dependencias, en la que el dominio no conoce los detalles externos.

## 🧩 Funciones de Cada Capa

- **Application (Casos de uso):** Contiene la lógica orquestadora que resuelve acciones del sistema.
- **Domain (Modelo de negocio):** Entidades, interfaces (puertos) y reglas del negocio puras.
- **Infrastructure (Adaptadores):** Implementaciones concretas como Eloquent o base de datos.
- **Interfaces (Adaptadores de entrada):** Controladores HTTP que traducen peticiones al lenguaje del dominio.

---

# 📚 Estructura de carpetas

## 🧠 Application Layer (Casos de uso)

### 📂 app/Application/Autor/UseCases

| Archivo             | Función                                                          |
|---------------------|------------------------------------------------------------------|
| `CreateAutor.php`   | Maneja la lógica para crear un nuevo autor.                     |
| `DeleteAutor.php`   | Elimina un autor por ID.                                         |
| `FindAutor.php`     | Busca un autor por ID.                                           |
| `ListAutores.php`   | Lista todos los autores disponibles.                             |
| `UpdateAutor.php`   | Actualiza información de un autor.                               |

### 📂 app/Application/Libro/UseCases

| Archivo             | Función                                                          |
|---------------------|------------------------------------------------------------------|
| `CreateLibro.php`   | Crea un nuevo libro relacionado a un autor.                     |
| `DeleteLibro.php`   | Elimina un libro por ID.                                         |
| `FindLibro.php`     | Busca un libro específico.                                       |
| `ListLibros.php`    | Lista todos los libros del sistema.                              |
| `UpdateLibro.php`   | Actualiza datos de un libro existente.                           |

---

## 🧩 Domain Layer

### 📂 app/Domain/Autor/Models

| Archivo        | Función                                                 |
|----------------|----------------------------------------------------------|
| `Autor.php`    | Modelo de dominio que representa un Autor.              |

### 📂 app/Domain/Autor/Repositories

| Archivo                          | Función                                                             |
|----------------------------------|----------------------------------------------------------------------|
| `AutorRepositoryInterface.php`  | Define los métodos que cualquier adaptador debe implementar.        |

### 📂 app/Domain/Autor/Services

| Archivo           | Función                                                                  |
|-------------------|---------------------------------------------------------------------------|
| `AutorService.php`| Contiene lógica adicional específica del dominio de Autor.               |

---

### 📂 app/Domain/Libro/Models

| Archivo        | Función                                                 |
|----------------|----------------------------------------------------------|
| `Libro.php`    | Modelo de dominio que representa un Libro.              |

### 📂 app/Domain/Libro/Repositories

| Archivo                          | Función                                                              |
|----------------------------------|-----------------------------------------------------------------------|
| `LibroRepositoryInterface.php`  | Puerto que define operaciones permitidas sobre libros.               |

### 📂 app/Domain/Libro/Services

| Archivo           | Función                                                                   |
|-------------------|----------------------------------------------------------------------------|
| `LibroService.php`| Lógica del dominio centrada en la entidad Libro.                         |

---

## 🧱 Infrastructure Layer

### 📂 app/Infrastructure/Persistence/Repositories

| Archivo                         | Función                                                              |
|----------------------------------|-----------------------------------------------------------------------|
| `EloquentAutorRepository.php`   | Adaptador que implementa AutorRepository usando Eloquent.            |
| `EloquentLibroRepository.php`   | Adaptador que implementa LibroRepository usando Eloquent.            |

---

## 🌐 Interfaces (Entrada HTTP)

### 📂 app/Interfaces/Web/Controllers

| Archivo              | Función                                                                 |
|-----------------------|-------------------------------------------------------------------------|
| `AutorController.php` | Adaptador de entrada que expone casos de uso del autor mediante HTTP.  |
| `LibroController.php` | Controlador HTTP para exponer operaciones del libro.                    |

---

# ✅ Ventajas

- El dominio permanece completamente independiente del framework o base de datos.
- Facilita las pruebas unitarias al poder sustituir adaptadores.
- Hace posible cambiar la tecnología (por ejemplo, Eloquent a Doctrine) sin tocar el dominio.
- Promueve una estructura altamente mantenible y escalable.

## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
