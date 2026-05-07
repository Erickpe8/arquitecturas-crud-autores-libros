# Biblioteca Laravel — CQRS (consultas y comandos)

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante aplica una forma ligera de **CQRS**:

- Las **lecturas** se modelan como **consultas** (`app/Queries`) procesadas por **query handlers** (`app/Handlers/...`).
- Las **escrituras** se modelan como **comandos** (`app/Commands`) procesados por **command handlers**.

Los controladores HTTP construyen el comando o la consulta y delegan en el **handler** correspondiente. Así se separa explícitamente el flujo de **consulta** del de **mutación**.

---

## Arquitectura

- **Queries + handlers:** listados, detalle, opciones de formulario, estadísticas del dashboard (`GetDashboardStatsQuery` → `GetDashboardStatsQueryHandler`).
- **Commands + handlers:** crear/actualizar/borrar autor o libro.
- **Capa web:** validación en controladores; para libros con **portada**, la subida al disco público se resuelve en el controlador antes de despachar `CreateBookCommand` / `UpdateBookCommand` (el comando recibe ya la ruta almacenada).

Los modelos Eloquent (`Autor`, `Libro`, `Genero`) siguen siendo la persistencia detrás de los handlers.

---

## Árbol del proyecto

```
app/
├── Commands/
│   ├── Authors/
│   │   ├── CreateAuthorCommand.php
│   │   ├── DeleteAuthorCommand.php
│   │   └── UpdateAuthorCommand.php
│   └── Books/
│       ├── CreateBookCommand.php
│       ├── DeleteBookCommand.php
│       └── UpdateBookCommand.php
├── Handlers/
│   ├── Concerns/
│   │   └── PaginatesBookListing.php
│   ├── Authors/
│   │   ├── CreateAuthorCommandHandler.php
│   │   ├── DeleteAuthorCommandHandler.php
│   │   ├── GetAuthorBooksQueryHandler.php
│   │   ├── GetAuthorDetailQueryHandler.php
│   │   ├── GetAuthorsQueryHandler.php
│   │   └── UpdateAuthorCommandHandler.php
│   ├── Books/
│   │   ├── CreateBookCommandHandler.php
│   │   ├── DeleteBookCommandHandler.php
│   │   ├── GetBookDetailQueryHandler.php
│   │   ├── GetBookFormOptionsQueryHandler.php
│   │   ├── PaginatedBooksQueryHandler.php
│   │   └── UpdateBookCommandHandler.php
│   └── Dashboard/
│       └── GetDashboardStatsQueryHandler.php
├── Http/
│   └── Controllers/
│       ├── AutorController.php
│       ├── LibroController.php
│       └── Controller.php
├── Models/
│   ├── Autor.php
│   ├── Genero.php
│   ├── Libro.php
│   └── User.php
├── Providers/
│   └── AppServiceProvider.php
└── Queries/
    ├── Authors/
    │   ├── GetAuthorBooksQuery.php
    │   ├── GetAuthorDetailQuery.php
    │   └── GetAuthorsQuery.php
    ├── Books/
    │   ├── GetBookDetailQuery.php
    │   ├── GetBookFormOptionsQuery.php
    │   ├── GetBooksQuery.php
    │   └── SearchBooksQuery.php
    └── Dashboard/
        └── GetDashboardStatsQuery.php
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
| `app/Commands` | DTOs de escritura (sin efectos hasta que los procesa el handler) |
| `app/Queries` | DTOs de lectura con parámetros necesarios |
| `app/Handlers` | Implementación: ejecuta la consulta o aplica el comando |
| `app/Http/Controllers` | HTTP + validación; despacho a handlers |
| `resources/views` | Vistas Blade |
| `routes` | Rutas web |

---

## Flujo de una petición típica

**Lectura:** el controlador crea una `*Query`, llama a `handler->handle(...)` y pasa el resultado a la vista.

**Escritura:** validación → construcción del `*Command` → `handler->handle(...)`.

---

## Funcionalidades

- **Panel de control:** agregados con query dedicada y handler de dashboard.
- **CRUD de autores y libros:** cada operación con comando/consulta y handler propios.
- **Listados de libros:** variante general vs búsqueda (`GetBooksQuery` / `SearchBooksQuery`) con el mismo handler paginado.

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

En MVC todo suele ir a métodos de controlador o servicios genéricos. CQRS **nombre las intenciones**: cada lectura/escritura tiene un tipo explícito, lo que ayuda a razonar sobre efectos secundarios y a escalar hacia buses de comandos o lecturas optimizadas si el proyecto lo requiriese.

---

## Objetivo educativo

Esta rama muestra **CQRS aplicado con pragmatismo** en Laravel: sin infraestructura pesada, pero con **separación clara** entre consultas y comandos.

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
