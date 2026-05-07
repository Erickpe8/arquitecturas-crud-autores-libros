# Biblioteca Laravel — Clean Architecture

## Descripción general

Este proyecto es una aplicación web de biblioteca construida con **Laravel 13** que permite gestionar autores y libros mediante operaciones CRUD, búsquedas y vistas construidas con **Blade** y **TailwindCSS**. El código está organizado siguiendo **Clean Architecture**, de modo que el dominio y los casos de uso no dependen del framework ni de Eloquent.

El repositorio tiene **varias ramas**, cada una con la misma funcionalidad base pero con una organización de backend distinta; esta documentación corresponde a la rama **`clean-architecture`**. El propósito es facilitar el **estudio comparativo** de patrones arquitectónicos sobre un mismo dominio funcional.

## Arquitectura implementada

**Clean Architecture** organiza el software en capas concéntricas: el dominio y las reglas de aplicación van en el centro y solo conocen **abstracciones** (interfaces); los detalles de infraestructura (persistencia con Eloquent, almacenamiento de ficheros, paginación del framework) viven en la periferia e implementan esos contratos.

El objetivo es **invertir dependencias**: Laravel actúa como motor HTTP y proveedor de drivers, mientras que entidades, DTOs y casos de uso permanecen **desacoplados** del framework. Las ventajas principales son mayor **testabilidad**, **mantenibilidad** y posibilidad de sustituir adaptadores sin reescribir el núcleo.

Respecto al **MVC tradicional**, los controladores dejan de contener consultas y persistencia directa: delegan en **casos de uso** que solo hablan con **interfaces de repositorio** y **almacenamiento**.

## Estructura del proyecto

Árbol simplificado y real de las carpetas relevantes en esta rama:

```text
app/
├── DTOs/
│   └── Pagination/
├── Entities/
├── Http/
│   └── Controllers/
├── Infrastructure/
│   ├── Framework/
│   ├── Persistence/
│   └── Storage/
├── Interfaces/
│   ├── Repositories/
│   └── Storage/
├── Models/
├── Providers/
└── UseCases/
    ├── Authors/
    ├── Books/
    └── Dashboard/
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
tests/
composer.json
package.json
vite.config.js
```

## Explicación de carpetas y responsabilidades

- **`app/Entities`**: Entidades de dominio puras (`Author`, `Book`, `AuthorSummary`) y reglas presentacionales independientes del framework (`BookCover`). No importan Laravel.

- **`app/DTOs`**: Objetos de transferencia entre capas (`AuthorWriteDto`, `BookWriteDto`, `BookIndexReadDto`, `DashboardStatsDto`, `PageResult`) para no acoplar casos de uso a arrays arbitrarios del HTTP.

- **`app/Interfaces`**: Contratos (**puertos**) que el dominio/aplicación necesitan: `AuthorRepositoryInterface`, `BookRepositoryInterface`, `CoverStorageInterface`. Las capas internas dependen solo de estas abstracciones.

- **`app/UseCases`**: Casos de uso por agregado (`Authors`, `Books`, `Dashboard`). Orquestan la lógica de aplicación invocando repositorios y tipos de dominio, sin usar facades ni Eloquent directamente.

- **`app/Infrastructure`**: **Adaptadores** concretos: repositorios Eloquent (`EloquentAuthorRepository`, `EloquentBookRepository`), almacenamiento de portadas con Laravel (`LaravelCoverStorage`), utilidades como `EloquentDate`, y `PaginatorPresenter` para adaptar la paginación del dominio al `LengthAwarePaginator` de Laravel.

- **`app/Http/Controllers`**: Adaptadores de entrada HTTP: validan la petición, construyen DTOs, ejecutan casos de uso y devuelven vistas o redirecciones.

- **`app/Models`**: Modelos Eloquent usados **solo en infraestructura** y donde el framework los requiere (por ejemplo resolución de rutas); la lectura/escritura de negocio pasa por repositorios.

- **`app/Providers`**: Registro de enlaces interfaz → implementación (`AppServiceProvider`).

- **`database/`**, **`resources/views/`**, **`routes/`**: Migraciones, seeders, vistas Blade y definición de rutas web.

El flujo entre capas respeta la **regla de dependencia**: de afuera hacia adentro solo se conocen interfaces y tipos de dominio; la infraestructura implementa los contratos definidos en `Interfaces`.

## Flujo de funcionamiento

1. **Entrada**: Una petición HTTP llega a Laravel y se enruta al controlador correspondiente (`AutorController` o `LibroController`), o a la closure del dashboard en `routes/web.php`.

2. **Procesamiento en el adaptador**: El controlador valida datos con el sistema de validación de Laravel y construye **DTOs** o identificadores numéricos necesarios para el caso de uso.

3. **Flujo interno**: El controlador invoca un **caso de uso** (`ListAuthorsUseCase`, `CreateBookUseCase`, etc.). El caso de uso ejecuta la operación usando únicamente **interfaces** de repositorio o almacenamiento.

4. **Acceso a datos**: Los **repositorios de infraestructura** consultan o modifican la base de datos mediante **Eloquent** y mapean filas a **entidades** de dominio. La subida de portadas se canaliza por `CoverStorageInterface` implementado con el disco público de Laravel.

5. **Respuesta final**: Los resultados (entidades, `PageResult`, etc.) se adaptan cuando hace falta (por ejemplo con `PaginatorPresenter`) y se pasan a **Blade** para renderizar HTML, o se redirige con mensaje flash.

## Funcionalidades actuales

- CRUD de autores (listado con búsqueda por nombre, alta, edición, detalle con libros asociados, eliminación).
- CRUD de libros (listado con búsqueda por título y filtro por género, alta con portada opcional, edición, detalle con autor, eliminación con borrado de portada en disco cuando aplica).
- Relación autor–libros reflejada en vistas y datos persistidos con claves foráneas.
- Dashboard de inicio con totales de autores y libros y género más frecuente entre los libros registrados.
- Tabla de géneros precargada por seeders para selects del formulario de libros.

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

Los seeders (`AuthorSeeder`, `GeneroSeeder`, `BookSeeder`) cargan autores reconocibles, un conjunto amplio de libros (del orden de un centenar de registros) con ISBN generados, géneros alineados a la tabla `generos`, y relaciones válidas entre libros y autores para probar listados, filtros y vistas de detalle.

## Comparación con MVC tradicional

En MVC clásico sobre Laravel, el controlador suele concentrar validación, consultas encadenadas con Eloquent y respuesta. En esta rama, esa lógica se **reparte**: los casos de uso encapsulan la intención de cada operación, los **repositorios** encapsulan el acceso a datos tras interfaces y las **entidades** representan el dominio sin Framework. La dependencia hacia adentro reduce el acoplamiento y localiza los cambios de persistencia en `Infrastructure`, al precio de más archivos y ceremonia inicial.

## Objetivo educativo

El proyecto permite **comparar** cómo se organiza el mismo CRUD bajo distintas arquitecturas en ramas paralelas, **enseñar** principios de separación de responsabilidades y dependencias, **analizar** ventajas y costes de cada estilo, y **evaluar** qué tan útil es cada enfoque en aplicaciones Laravel de tamaño modesto.

## Muchas gracias por llegar hasta aqui 
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
