# Biblioteca Laravel — Repository Pattern

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante implementa el **patrón Repository**: las consultas y persistencia sobre los modelos **Author** y **Book** se encapsulan en **repositorios concretos**, expuestos mediante **interfaces**. Los controladores dependen de las interfaces; Laravel resuelve las implementaciones en `AppServiceProvider`.

---

## Arquitectura

Se desacopla la **capa HTTP** de los **detalles de acceso a datos**:

- **HTTP:** rutas → controladores (`AuthorController`, `BookController`, `DashboardController`).
- **Dominio de datos:** interfaces `AuthorRepositoryInterface` y `BookRepositoryInterface` definen el contrato.
- **Infraestructura:** `AuthorRepository` y `BookRepository` implementan esos contratos usando **Eloquent**.

Las vistas Blade siguen el layout principal (`layouts/app`). Las peticiones web siguen el ciclo estándar de Laravel.

---

## Árbol del proyecto

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthorController.php
│       ├── BookController.php
│       └── DashboardController.php
├── Models/
│   ├── Author.php
│   └── Book.php
├── Providers/
│   └── AppServiceProvider.php
└── Repositories/
    ├── AuthorRepository.php
    ├── BookRepository.php
    └── Interfaces/
        ├── AuthorRepositoryInterface.php
        └── BookRepositoryInterface.php
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
| `app/Http/Controllers` | Controladores HTTP que delegan en los repositorios |
| `app/Repositories` | Implementaciones concretas del acceso a datos |
| `app/Repositories/Interfaces` | Contratos que consumen los controladores |
| `app/Models` | Modelos Eloquent (`Author`, `Book`) |
| `app/Providers` | Registro de bindings interfaz → implementación |
| `resources/views` | Vistas Blade (layouts, autores, libros, dashboard) |
| `routes` | Definición de rutas web |
| `database/migrations` | Esquema de tablas |
| `database/seeders` | Datos de ejemplo |

---

## Flujo de una petición típica

1. El navegador solicita una URL definida en `routes/web.php`.
2. Laravel instancia el controlador correspondiente e **inyecta** `AuthorRepositoryInterface` o `BookRepositoryInterface` según el caso.
3. El controlador llama a métodos del repositorio (por ejemplo `all()`, `find`, `create`).
4. El repositorio concreto usa el modelo Eloquent y devuelve datos al controlador.
5. El controlador devuelve una vista Blade o redirección.

---

## Funcionalidades

- **Panel de control:** estadísticas de autores y libros (vía repositorios).
- **CRUD de autores:** alta, listado, edición, eliminación y vista detalle con libros relacionados.
- **CRUD de libros:** alta con selección de autor, listado, edición y eliminación.
- **Relaciones:** un autor tiene muchos libros; los libros pertenecen a un autor.

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

En MVC sin repository, los controladores suelen usar **Eloquent directamente**. Aquí, las consultas y operaciones de persistencia viven en **repositorios**, lo que facilita **tests con dobles** y cambiar la fuente de datos sin tocar los controladores, manteniendo las rutas y vistas igual que en el CRUD clásico.

---

## Objetivo educativo

Esta rama muestra cómo introducir **abstracción sobre el acceso a datos** sin cambiar la experiencia de usuario: mismo CRUD y mismo stack Laravel, con **interfaces + implementaciones** enlazadas en el contenedor.

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
