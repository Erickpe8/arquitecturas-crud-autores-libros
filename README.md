# Biblioteca Laravel — MVC

## Descripción general

Este proyecto es una aplicación web de biblioteca construida con **Laravel 13** que permite gestionar autores y libros mediante operaciones CRUD, búsquedas y vistas construidas con **Blade** y **TailwindCSS**. En esta rama el backend sigue el enfoque **MVC tradicional de Laravel**: la lógica de consultas y persistencia reside principalmente en los controladores junto con los modelos **Eloquent**.

El repositorio tiene **varias ramas**, cada una con la misma funcionalidad base pero con una organización de backend distinta; esta documentación corresponde a la rama **`mvc`**. El propósito es facilitar el **estudio comparativo** de patrones arquitectónicos sobre un mismo dominio funcional.

## Arquitectura implementada

**MVC (Model–View–Controller)** en Laravel separa la presentación (**Blade**), la coordinación HTTP (**controladores**) y el acceso a datos (**modelos Eloquent**). Las rutas delegan en los controladores, que validan la entrada y ejecutan operaciones sobre los modelos.

El objetivo es mantener una curva de aprendizaje **baja** y una estructura **directa**, típica de aplicaciones CRUD pequeñas. Las ventajas principales son simplicidad, menos archivos intermediarios y convenciones muy conocidas del ecosistema Laravel.

Respecto a un diseño más “en capas”, aquí los controladores suelen concentrar **consultas encadenadas y persistencia** junto con la respuesta HTTP.

## Estructura del proyecto

Árbol simplificado y real de las carpetas relevantes en esta rama:

```text
app/
├── Http/
│   └── Controllers/
├── Models/
└── Providers/
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

- **`app/Http/Controllers`**: Punto de entrada HTTP tras las rutas. Valida datos (`Request`), ejecuta consultas y comandos sobre los modelos Eloquent y devuelve vistas o redirecciones.

- **`app/Models`**: Modelos activos (`Autor`, `Libro`, `Genero`, etc.) con `$fillable`, relaciones (`hasMany`, `belongsTo`) y en algunos casos **accessors** (por ejemplo URL de portada).

- **`app/Providers`**: Arranque y configuración de servicios Laravel (`AppServiceProvider` sin registros arquitectónicos adicionales en esta rama).

- **`database/`**, **`resources/views/`**, **`routes/`**: Migraciones, seeders, vistas Blade y rutas web (recursos REST para `autores` y `libros`).

La separación es esencialmente la **convención estándar** de Laravel: controladores delgados o voluminosos según la operación, sin capas obligatorias de servicios o repositorios.

## Flujo de funcionamiento

1. **Entrada**: Laravel recibe la petición y enruta a `AutorController` o `LibroController`, o ejecuta la closure del dashboard en `routes/web.php`.

2. **Procesamiento**: El controlador valida la entrada cuando corresponde y ejecuta directamente consultas Eloquent (`Autor::…`, `Libro::…`, `Genero::…`) sobre los modelos.

3. **Flujo interno**: Las relaciones de modelos cargan datos relacionados (`with`, `load`) donde la vista lo necesita.

4. **Acceso a datos**: Todo el acceso pasa por **Eloquent** contra las tablas definidas en migraciones.

5. **Respuesta final**: Se renderiza una vista Blade con los datos compactados o se redirige con mensajes flash.

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

Esta rama **es** la línea base MVC clásica sobre Laravel: no hay repositorios ni casos de uso intermedios. Las responsabilidades están reunidas en controladores y modelos; cualquier otra rama del repositorio introduce **separación adicional** con distintos trade-offs (más archivos y límites de capas más claros).

## Objetivo educativo

El proyecto permite **comparar** cómo se organiza el mismo CRUD bajo distintas arquitecturas en ramas paralelas, **enseñar** principios de separación de responsabilidades y dependencias, **analizar** ventajas y costes de cada estilo, y **evaluar** qué tan útil es cada enfoque en aplicaciones Laravel de tamaño modesto.

## Muchas gracias por llegar hasta aqui 
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
