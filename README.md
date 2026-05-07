# Biblioteca Laravel — Service Layer

## Descripción del proyecto

Es una aplicación web desarrollada en **Laravel** que permite gestionar **autores** y **libros** mediante operaciones CRUD. La web muestra un panel de control con información agregada.

Esta variante introduce una **capa de servicios** (`AuthorService`, `BookService`): los controladores delegan la **lógica de aplicación** (consultas, validaciones de reglas, ficheros de portada, etc.) en servicios; los modelos Eloquent siguen representando el dominio persistente.

---

## Arquitectura

- **HTTP:** rutas → `AutorController` y `LibroController`.
- **Servicios:** orquestan casos de uso (listados con filtros, CRUD, subida de portadas, reglas de validación reutilizables).
- **Modelos:** `Autor`, `Libro`, `Genero` y relaciones Eloquent.
- **Vistas:** Blade con layout principal (`layouts/app`).

El dashboard (`/`) obtiene totales y el género más registrado llamando a los mismos servicios, manteniendo la lectura agregada fuera del controlador de recursos.

---

## Árbol del proyecto

```
app/
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
└── Services/
    ├── AuthorService.php
    └── BookService.php
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
| `app/Http/Controllers` | Entrada HTTP fina; delega en servicios |
| `app/Services` | Reglas, consultas y operaciones de negocio de aplicación |
| `app/Models` | Modelos Eloquent y relaciones |
| `resources/views` | Vistas Blade (layouts, autores, libros, dashboard) |
| `routes` | Rutas web (`/` y recursos `autores`, `libros`) |
| `database/migrations` | Esquema de tablas |
| `database/seeders` | Datos de ejemplo |

---

## Flujo de una petición típica

1. Una ruta resuelve a un método del controlador.
2. Laravel **inyecta** `AuthorService` o `BookService` en el constructor del controlador.
3. El controlador valida con `$service->storeRules()` / `updateRules()` y llama a `store`, `update`, etc.
4. El servicio trabaja con modelos Eloquent (y almacenamiento para portadas).
5. Se devuelve vista o redirección con mensaje flash.

---

## Funcionalidades

- **Panel de control:** totales de autores y libros; género más registrado en catálogo.
- **CRUD de autores:** búsqueda, alta, detalle con libros, edición y eliminación.
- **CRUD de libros:** filtros por título y género, alta con portada opcional, edición y borrado con limpieza de fichero.
- **Relaciones:** cada libro pertenece a un autor; géneros enlazados a la tabla `generos`.

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

En MVC sin capa de servicio, la lógica suele concentrarse en los **controladores**. Aquí, los controladores se mantienen **delgados** y la lógica repetible o voluminosa vive en **servicios**, lo que facilita pruebas y reutilización sin cambiar rutas ni vistas.

---

## Objetivo educativo

Esta rama muestra cómo ordenar un CRUD Laravel con una **capa de aplicación explícita** (servicios) entre HTTP y Eloquent, manteniendo el mismo producto funcional que el MVC clásico.

---

Muchas gracias por revisar este proyecto.

Si tienes comentarios o sugerencias contactame en **ericksperezc@gmail.com**, seguime en [**YouTube**](https://www.youtube.com/@ericksperezc) y [**Instagram**](https://www.instagram.com/ericksperezc/).
