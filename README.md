# Biblioteca Laravel — Arquitectura hexagonal (puertos y adaptadores)

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante separa **núcleo**, **aplicación** e **infraestructura**:

- En **`Core`** viven el **dominio** (entidades/DTOs como `Author`, `Book`) y los **puertos salientes** (`AuthorRepositoryPort`, `BookRepositoryPort`, `CoverStoragePort`).
- En **`Application`** hay **casos de uso** por comando (crear autor, listar libros, estadísticas del dashboard, etc.).
- En **`Infrastructure`** están los **adaptadores** que hablan con Eloquent, el sistema de ficheros de Laravel y utilidades como paginación.

Los controladores HTTP actúan como **adaptadores de entrada**: solo reciben la petición y delegan en un caso de uso.

---

## Arquitectura

1. **Entrada (web):** rutas → controladores → caso de uso correspondiente.
2. **Aplicación:** cada clase `*UseCase` coordina el flujo sin conocer detalles de Laravel más allá de lo que los puertos exponen.
3. **Dominio:** modelos ricos o resúmenes (`AuthorSummary`) y reglas compartidas donde aplique.
4. **Salida:** implementaciones en `Infrastructure` que cumplen los puertos; enlazadas en `AppServiceProvider`.

El dashboard usa `GetDashboardStatsUseCase` para mantener la misma separación que el resto de pantallas.

---

## Árbol del proyecto

```
app/
├── Application/
│   ├── Authors/
│   │   ├── CreateAuthorUseCase.php
│   │   ├── DeleteAuthorUseCase.php
│   │   ├── GetAuthorWithBooksUseCase.php
│   │   ├── ListAuthorsUseCase.php
│   │   └── UpdateAuthorUseCase.php
│   ├── Books/
│   │   ├── CreateBookUseCase.php
│   │   ├── DeleteBookUseCase.php
│   │   ├── GetBookFormOptionsUseCase.php
│   │   ├── GetBookUseCase.php
│   │   ├── ListBooksUseCase.php
│   │   └── UpdateBookUseCase.php
│   └── Dashboard/
│       └── GetDashboardStatsUseCase.php
├── Core/
│   ├── Domain/
│   │   ├── Author.php
│   │   ├── AuthorSummary.php
│   │   └── Book.php
│   ├── Pagination/
│   │   └── PaginatedResult.php
│   ├── Ports/
│   │   └── Outbound/
│   │       ├── AuthorRepositoryPort.php
│   │       ├── BookRepositoryPort.php
│   │       └── CoverStoragePort.php
│   └── Services/
│       └── BookCoverUrlGenerator.php
├── Http/
│   └── Controllers/
│       ├── AutorController.php
│       ├── LibroController.php
│       └── Controller.php
├── Infrastructure/
│   ├── Laravel/
│   │   └── PaginatorFactory.php
│   ├── Persistence/
│   │   └── Eloquent/
│   │       ├── EloquentAuthorRepository.php
│   │       ├── EloquentBookRepository.php
│   │       └── EloquentDate.php
│   └── Storage/
│       └── LaravelCoverStorageAdapter.php
├── Models/
│   ├── Autor.php
│   ├── Genero.php
│   ├── Libro.php
│   └── User.php
└── Providers/
    └── AppServiceProvider.php
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
```

---

## Carpetas principales

| Carpeta | Función |
|---------|---------|
| `app/Application` | Casos de uso (orquestación) |
| `app/Core/Domain` | Modelos del núcleo |
| `app/Core/Ports` | Contratos hacia persistencia y almacenamiento |
| `app/Infrastructure` | Adaptadores Eloquent, disco, paginación |
| `app/Http/Controllers` | Adaptadores HTTP → casos de uso |
| `app/Models` | Modelos Eloquent usados por los adaptadores |
| `resources/views` | Vistas Blade |
| `routes` | Rutas web |

---

## Flujo de una petición típica

1. Una acción del controlador resuelve el caso de uso por **inyección de dependencias**.
2. El caso de uso usa **puertos** (`AuthorRepositoryPort`, etc.), no clases de infraestructura.
3. Laravel entrega las implementaciones concretas registradas en `AppServiceProvider`.
4. El resultado se mapea a vistas Blade o redirecciones HTTP.

---

## Funcionalidades

- **Panel de control:** totales y género más registrado vía `GetDashboardStatsUseCase`.
- **CRUD de autores y libros:** cada operación tiene su caso de uso dedicado.
- **Portadas:** subida y borrado abstractos tras `CoverStoragePort`.

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

Semillas típicas: autor(es), género(s) y libro(s) para probar el CRUD y el panel sin crear registros a mano.

---

## Comparación con MVC «plano»

En MVC clásico los controladores suelen acoplarse a **Eloquent y facades**. Aquí, la **lógica estable** depende de **interfaces (puertos)**; cambiar ORM o almacenamiento implica nuevos adaptadores sin reescribir casos de uso.

---

## Objetivo educativo

Esta rama ilustra **hexagonal / puertos y adaptadores** en un proyecto Laravel realista: mismas pantallas que el CRUD MVC, con límites explícitos entre dominio, aplicación e infraestructura.

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
