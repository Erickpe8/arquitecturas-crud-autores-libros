# Biblioteca Laravel — Clean Architecture

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante sigue **Clean Architecture**: el **dominio** (`Entities`) y los **casos de uso** (`UseCases`) no dependen de Laravel ni de Eloquent; solo conocen **interfaces** (`Interfaces`) y **DTOs**. La persistencia, el almacenamiento de portadas y la paginación del framework viven en **`Infrastructure`** e implementan esos contratos. Los controladores son **adaptadores de entrada**: validan, construyen DTOs y ejecutan casos de uso.

El repositorio incluye **otras ramas** con la misma funcionalidad y distinta organización de backend; esta documentación corresponde a la rama **`clean-architecture`**.

---

## Arquitectura

**Capas (regla de dependencia hacia adentro):**

- **`Entities`:** objetos de dominio (`Author`, `Book`, `AuthorSummary`, `BookCover`) sin imports de framework.
- **`DTOs`:** transferencia entre HTTP y casos de uso (`AuthorWriteDto`, `BookWriteDto`, `BookIndexReadDto`, `DashboardStatsDto`, `PageResult`).
- **`Interfaces`:** puertos (`AuthorRepositoryInterface`, `BookRepositoryInterface`, `CoverStorageInterface`).
- **`UseCases`:** orquestación por agregado (`Authors`, `Books`, `Dashboard`).
- **`Infrastructure`:** adaptadores Eloquent (`EloquentAuthorRepository`, `EloquentBookRepository`), disco (`LaravelCoverStorage`), utilidades (`EloquentDate`, `PaginatorPresenter`).
- **`Http/Controllers`:** Laravel valida y despacha al caso de uso correspondiente.

---

## Árbol del proyecto

```
app/
├── DTOs/
│   ├── AuthorWriteDto.php
│   ├── BookIndexReadDto.php
│   ├── BookWriteDto.php
│   ├── DashboardStatsDto.php
│   └── Pagination/
│       └── PageResult.php
├── Entities/
│   ├── Author.php
│   ├── AuthorSummary.php
│   ├── Book.php
│   └── BookCover.php
├── Http/
│   └── Controllers/
│       ├── AutorController.php
│       ├── LibroController.php
│       └── Controller.php
├── Infrastructure/
│   ├── Framework/
│   │   └── PaginatorPresenter.php
│   ├── Persistence/
│   │   ├── EloquentAuthorRepository.php
│   │   ├── EloquentBookRepository.php
│   │   └── EloquentDate.php
│   └── Storage/
│       └── LaravelCoverStorage.php
├── Interfaces/
│   ├── Repositories/
│   │   ├── AuthorRepositoryInterface.php
│   │   └── BookRepositoryInterface.php
│   └── Storage/
│       └── CoverStorageInterface.php
├── Models/
│   ├── Autor.php
│   ├── Genero.php
│   ├── Libro.php
│   └── User.php
├── Providers/
│   └── AppServiceProvider.php
└── UseCases/
    ├── Authors/
    │   ├── CreateAuthorUseCase.php
    │   ├── DeleteAuthorUseCase.php
    │   ├── GetAuthorForEditUseCase.php
    │   ├── ListAuthorsUseCase.php
    │   ├── ShowAuthorUseCase.php
    │   └── UpdateAuthorUseCase.php
    ├── Books/
    │   ├── CreateBookUseCase.php
    │   ├── DeleteBookUseCase.php
    │   ├── GetBookFormOptionsUseCase.php
    │   ├── ListBooksUseCase.php
    │   ├── ShowBookUseCase.php
    │   └── UpdateBookUseCase.php
    └── Dashboard/
        └── GetDashboardStatsUseCase.php
bootstrap/
config/
database/
├── factories/
├── migrations/
└── seeders/
public/
resources/
├── css/
├── js/
└── views/
routes/
├── console.php
└── web.php
tests/
```

---

## Carpetas principales

| Carpeta | Función |
|---------|---------|
| `app/Entities` | Dominio puro |
| `app/DTOs` | Contratos de datos entre capas |
| `app/Interfaces` | Puertos (repositorios, almacenamiento) |
| `app/UseCases` | Casos de uso por contexto |
| `app/Infrastructure` | Adaptadores concretos (Eloquent, ficheros, paginación) |
| `app/Http/Controllers` | Adaptadores HTTP |
| `app/Models` | Eloquent usado desde infraestructura / framework |
| `app/Providers` | Bindings interfaz → implementación |
| `resources/views` | Vistas Blade |
| `routes` | Rutas web |
| `database/migrations` | Esquema |
| `database/seeders` | Datos de ejemplo |

---

## Flujo de una petición típica

1. La petición llega al controlador o a la closure del dashboard en `routes/web.php`.
2. Se valida en la capa HTTP y se arman DTOs o identificadores.
3. Se ejecuta el **caso de uso**, que solo usa interfaces de repositorio y almacenamiento.
4. Los adaptadores de infraestructura consultan o modifican datos con Eloquent y mapean a entidades.
5. Resultados y paginación se adaptan si hace falta (`PaginatorPresenter`) y se envían a Blade o redirección.

---

## Funcionalidades

- **Panel de control:** totales y género más frecuente (`GetDashboardStatsUseCase`).
- **CRUD de autores:** listado con búsqueda, alta, edición, detalle con libros, eliminación.
- **CRUD de libros:** filtros, portada opcional vía `CoverStorageInterface`, edición y borrado con limpieza de fichero.
- **Relaciones:** autor–libros persistidas con claves foráneas; géneros para formularios.

---

## Tecnologías

| Área | Tecnología |
|------|------------|
| Framework | Laravel |
| Lenguaje | PHP |
| Base de datos | MySQL (compatible con SQLite para desarrollo) |
| Frontend | Blade, Vite, Tailwind CSS |
| Empaquetado | npm |
| Servidor local | `php artisan serve` |

---

## Instalación

### Requisitos

- PHP ≥ 8.2 con extensiones habituales de Laravel  
- Composer  
- Node.js y npm  
- MySQL (o SQLite para pruebas rápidas)

### Pasos

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configura la base de datos en `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, etc.).

```bash
php artisan migrate
npm install
npm run build
php artisan serve
```

Abre `http://127.0.0.1:8000` en el navegador.

---

## Seeders

Para cargar datos de ejemplo:

```bash
php artisan db:seed
```

Semillas típicas (`AuthorSeeder`, `GeneroSeeder`, `BookSeeder`): autores, géneros y muchos libros con ISBN y relaciones válidas para probar listados, filtros y detalle.

---

## Comparación con MVC «plano»

En MVC clásico el controlador suele mezclar validación, Eloquent y respuesta. Aquí la **intención** vive en **casos de uso**, el **acceso a datos** tras interfaces y el **dominio** en entidades sin framework: mayor claridad y testabilidad, a cambio de más archivos y ceremonia.

---

## Objetivo educativo

Comparar el mismo CRUD bajo **Clean Architecture** frente a otras ramas del repositorio, visualizar **inversión de dependencias** en Laravel y valorar coste vs beneficio en proyectos de tamaño modesto.

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
