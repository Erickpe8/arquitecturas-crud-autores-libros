# Biblioteca Laravel — Domain-Driven Design (organización modular)

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante organiza el código por **subdominios** dentro de `App\Domains`: cada dominio agrupa **modelo**, **repositorio**, **servicio**, **Form Requests** y **controlador** relacionados con **Author** o **Book**. El objetivo es acotar responsabilidades por contexto y facilitar la evolución del código cuando crece el modelo mental del negocio.

---

## Arquitectura

- **Dominio Author:** `Controllers`, `Models`, `Repositories`, `Services`, `Requests`.
- **Dominio Book:** misma estructura; incluye modelo `Genre` para géneros de catálogo.
- **HTTP:** rutas apuntan a controladores de dominio (`AuthorController`, `BookController`).
- **Dashboard:** closure en `routes/web.php` usa los modelos de dominio para totales y agregación por género.

No es DDD «puro» en sentido estrito (no hay capas de aplicación/infra separadas globalmente), pero **refleja la idea de bounded context** en carpetas y namespaces de Laravel.

---

## Árbol del proyecto

```
app/
├── Domains/
│   ├── Author/
│   │   ├── Controllers/
│   │   │   └── AuthorController.php
│   │   ├── Models/
│   │   │   └── Author.php
│   │   ├── Repositories/
│   │   │   └── AuthorRepository.php
│   │   ├── Requests/
│   │   │   ├── StoreAuthorRequest.php
│   │   │   └── UpdateAuthorRequest.php
│   │   └── Services/
│   │       └── AuthorService.php
│   └── Book/
│       ├── Controllers/
│       │   └── BookController.php
│       ├── Models/
│       │   ├── Book.php
│       │   └── Genre.php
│       ├── Repositories/
│       │   └── BookRepository.php
│       ├── Requests/
│       │   ├── StoreBookRequest.php
│       │   └── UpdateBookRequest.php
│       └── Services/
│           └── BookService.php
├── Http/
│   └── Controllers/
│       └── Controller.php
├── Models/
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
| `app/Domains/Author` | Todo lo relativo a autores en un solo módulo |
| `app/Domains/Book` | Libros, género y persistencia asociada |
| `app/Domains/*/Repositories` | Acceso a datos por contexto |
| `app/Domains/*/Services` | Casos de uso de aplicación por contexto |
| `app/Domains/*/Requests` | Validación por acción (store/update) |
| `resources/views` | Vistas Blade compartidas del CRUD |
| `routes` | Rutas web |
| `database/migrations` | Esquema de tablas |
| `database/seeders` | Datos de ejemplo |

---

## Flujo de una petición típica

1. Laravel enruta hacia `AuthorController` o `BookController` en el namespace del dominio.
2. Los métodos `store` / `update` utilizan **Form Requests** del mismo dominio para validar.
3. Los controladores delegan en **servicios** que a su vez usan **repositorios** y modelos del dominio.
4. Se responde con vistas Blade o redirección.

---

## Funcionalidades

- **Panel de control:** recuentos globales y género más frecuente en libros.
- **CRUD de autores:** alta, listado con búsqueda, detalle con libros, edición y eliminación.
- **CRUD de libros:** filtros, portada opcional, relación con autor y género.
- **Separación por dominio:** cambios en «libros» no mezclan archivos con «autores» salvo vistas/rutas compartidas.

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

En MVC tradicional todo suele vivir bajo `Http/Controllers` y `Models` globales. Aquí, **código y namespaces reflejan límites del problema** (autores vs libros): más fácil ubicar impactos y extraer un paquete o microservicio más adelante si hiciera falta.

---

## Objetivo educativo

Esta rama muestra una **organización orientada al dominio** dentro de Laravel sin abandonar el stack habitual (Eloquent, Blade, rutas resource).

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
