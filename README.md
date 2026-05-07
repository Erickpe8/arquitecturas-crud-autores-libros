# Arquitecturas CRUD — Autores y Libros | Repositorio comparativo

![GitHub Repo stars](https://img.shields.io/github/stars/Erickpe8/arquitecturas-crud-autores-libros?style=social)
![GitHub forks](https://img.shields.io/github/forks/Erickpe8/arquitecturas-crud-autores-libros?style=social)

## Descripción general

Este repositorio agrupa **varias ramas** que implementan el mismo caso de uso funcional — gestión **CRUD** de **autores** y **libros** con **Laravel 13** — aplicando **distintas arquitecturas de organización del backend**. El fin es disponer de un **material comparativo** para analizar separación de responsabilidades, acoplamiento y coste de mantenimiento frente a un **MVC** convencional.

La rama **`main`** contiene **únicamente documentación de entrada** para el repositorio (este archivo y exclusiones en `.gitignore`). El **código ejecutable** de la aplicación vive en ramas nombradas según el patrón (`mvc`, `repository-pattern`, `service-layer`, `domain-driven-design`, `hexagonal-architecture`, `cqrs`, `clean-architecture`).

El dominio funcional se mantiene alineado entre ramas: altas, listados con **búsqueda y filtros**, ediciones, eliminaciones, **relaciones** autor–libro y datos de **género**, además de una **vista de inicio** con métricas agregadas donde el código está presente.

## Arquitectura implementada

En **`main`** no se implementa una arquitectura de aplicación Laravel: la rama cumple rol de **índice documental** del monorepositorio. La variante **MVC clásica** está en la rama **`mvc`**; el resto de ramas refactoriza la misma funcionalidad según el patrón indicado en el nombre de la rama.

## Estructura del proyecto

```bash
.
├── README.md
└── .gitignore
```

## Explicación de carpetas y responsabilidades

- **`README.md`**: Punto de entrada del repositorio; enlaces conceptuales a ramas por arquitectura e instrucciones comunes de instalación y seeders (aplicables tras cambiar de rama).
- **`.gitignore`**: Patrones de archivos y carpetas locales que no deben versionarse.

Los directorios estándar de un proyecto Laravel (`app/`, `bootstrap/`, `config/`, `database/`, `public/`, `resources/`, `routes/`, etc.) aparecen **solo en las ramas que incluyen la aplicación**.

## Flujo de funcionamiento

1. **Entrada:** clonación del repositorio y selección de una rama de arquitectura mediante `git checkout`.
2. **Contexto activo:** el nombre de la rama determina la organización de `app/` y el flujo entre capas descrito en el README de esa rama.
3. **Instalación:** dependencias Composer y npm, archivo `.env`, migraciones y datos semilla.
4. **Acceso a datos:** según la rama, vía modelos Eloquent directamente o a través de capas intermedias (repositorios, servicios, casos de uso, comandos/consultas, etc.).
5. **Salida:** respuestas HTTP con vistas **Blade** y los mismos recursos de rutas (`/`, `autores`, `libros`) en todas las ramas con código.

## Funcionalidades actuales

En las ramas con aplicación Laravel se mantiene: **CRUD de autores**, **CRUD de libros** (incluida **carga opcional de portada** donde el código lo contempla), **búsquedas** y **filtros** en listados, y **relaciones** persistentes entre autores, libros y catálogo de géneros. En **`main`** no hay pantallas ejecutables; sirve como mapa del repositorio.

## Tecnologías utilizadas

- Laravel 13
- PHP
- MySQL
- Blade
- TailwindCSS
- Eloquent ORM
- Composer
- Vite
- Git
- GitHub

## Instalación del proyecto

Clone el repositorio, cambie a la rama de arquitectura deseada y ejecute los comandos **desde la raíz del proyecto** (donde existe `artisan`):

```bash
git clone https://github.com/Erickpe8/arquitecturas-crud-autores-libros.git
```

```bash
composer install
```

```bash
npm install
npm run dev
```

```bash
cp .env.example .env
php artisan key:generate
```

```bash
php artisan migrate --seed
```

```bash
php artisan serve
```

## Seeders y datos de prueba

En las ramas con código, los seeders (`AuthorSeeder`, `GeneroSeeder`, `BookSeeder`) cargan **autores reconocibles**, el catálogo de **géneros** y **aproximadamente un centenar de libros** con **ISBN** y relaciones válidas hacia autores, pensados para ejercitar listados paginados, búsquedas y vistas de detalle.

## Comparación con MVC tradicional

La **línea base MVC** del mismo dominio está en la rama **`mvc`**: controladores y modelos **Eloquent** sin obligatoriedad de capas adicionales. Las demás ramas introducen **abstracciones y límites de módulo** sobre ese mismo comportamiento observable; **`main`** no contiene implementación y solo orienta la comparación entre ramas.

## Objetivo educativo

El proyecto busca **comparar arquitecturas** sobre un caso de uso único, **enseñar organización de código** en Laravel, **mostrar separación de responsabilidades** y **analizar ventajas y desventajas** de cada patrón en un entorno controlado y reproducible.

## Autor

- **Nombre:** Erick Pérez
- **GitHub:** https://github.com/Erickpe8
- **Correo electrónico:** ericksperezc@gmail.com
