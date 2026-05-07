# Arquitecturas CRUD — Autores y Libros | Modelo – Vista – Controlador (MVC)

![GitHub Repo stars](https://img.shields.io/github/stars/Erickpe8/arquitecturas-crud-autores-libros?style=social)
![GitHub forks](https://img.shields.io/github/forks/Erickpe8/arquitecturas-crud-autores-libros?style=social)

## Descripción general

Esta rama implementa el **CRUD de autores y libros** en **Laravel 13** siguiendo el **patrón Modelo – Vista – Controlador** tal como suele aplicarse en proyectos Laravel: rutas enlazan a **controladores**, la persistencia y las consultas se expresan con **modelos Eloquent**, y la interfaz se renderiza con **Blade**. Sirve como **referencia base** para comparar el mismo dominio funcional con el resto de ramas arquitectónicas del repositorio.

El objetivo educativo es mostrar la organización **mínima impuesta por el framework** y el volumen de responsabilidades que típicamente permanece en controladores y modelos cuando no se introducen capas adicionales explícitas.

## Arquitectura implementada

**MVC** separa la **entrada HTTP** (controlador), la **representación persistente** (modelos asociados a tablas) y la **presentación** (vistas). Aquí los controladores `AutorController` y `LibroController` coordinan validación, uso de Eloquent y respuesta; el modelo encapsula relaciones (`Autor`–`Libro`) y reglas de acceso a datos a nivel ORM.

Ventajas en este contexto: **simplicidad**, curva de aprendizaje baja y alineación directa con la documentación oficial de Laravel. Respecto a otras ramas del mismo repositorio, esta variante concentra más responsabilidades en **controladores y modelos** y **no impone** repositorios, servicios de aplicación ni casos de uso nominales.

## Estructura del proyecto

Árbol **real** de `app/` en esta rama:

```bash
app/
├── Http/
│   └── Controllers/
├── Models/
└── Providers/
```

El resto del esqueleto Laravel (`routes/`, `resources/views/`, `database/`, `config/`, etc.) respeta la convención estándar del framework.

## Explicación de carpetas y responsabilidades

- **`Http/Controllers`**: Adaptadores HTTP para **autores** y **libros**; validan entrada, invocan Eloquent sobre los modelos y devuelven vistas o redirecciones. La ruta `/` usa una **closure** en `routes/web.php` para el panel inicial con agregados sobre los modelos.
- **`Models`**: Modelos **Autor**, **Libro**, **Genero** y **User**; definición de **fillable**, relaciones y lógica de presentación ligera donde existe (por ejemplo URL derivada de portada en **Libro**).
- **`Providers`**: Registro de servicios del framework (`AppServiceProvider`); sin bindings adicionales obligatorios para esta variante MVC.

La separación entre capas sigue el **flujo request → controller → model/view** habitual en Laravel.

## Flujo de funcionamiento

1. **Entrada:** `routes/web.php` enlaza la URL a un método de controlador o a la closure del **dashboard**.
2. **Procesamiento:** el controlador valida la petición y ejecuta consultas o comandos sobre los **modelos Eloquent**.
3. **Capas:** no hay capa intermedia obligatoria entre HTTP y ORM; la coordinación es responsabilidad del controlador.
4. **Acceso a datos:** lectura y escritura en base de datos mediante Eloquent y migraciones existentes.
5. **Respuesta final:** datos compactados hacia vistas Blade (`resources/views`) o **redirect** con mensajes de sesión.

## Funcionalidades actuales

- **CRUD de autores**: listado con **búsqueda por nombre**, creación, edición, detalle con libros relacionados y eliminación.
- **CRUD de libros**: listado con **búsqueda** y **filtro por género**, alta con **portada opcional**, edición, detalle y eliminación.
- **Relaciones**: cada libro pertenece a un autor; géneros almacenados y utilizados en formularios y filtros.

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

Tras el clon, ejecute `git checkout mvc` antes de los pasos en la raíz del proyecto.

## Seeders y datos de prueba

Los seeders (`AuthorSeeder`, `GeneroSeeder`, `BookSeeder`) cargan **autores reconocibles**, **géneros** y **aproximadamente un centenar de libros** con **ISBN** y relaciones coherentes para probar búsquedas, paginación y vistas de detalle sin crear datos manualmente.

## Comparación con MVC tradicional

Esta rama **es** la referencia **MVC tradicional** sobre Laravel: responsabilidades de aplicación y acceso a datos pueden **mezclarse** entre controlador y modelo según el método. **No** se han separado por contrato interfaces de repositorio ni servicios de dominio; la mantenibilidad depende de disciplina en el equipo. Para mayor **desacoplamiento** o **escalabilidad** modular, las demás ramas muestran patrones que externalizan consultas, reglas o casos de uso.

## Objetivo educativo

Comparar este baseline contra otras ramas del mismo repositorio para **visualizar** cómo crece el número de artefactos cuando se exige **mayor separación de responsabilidades** y **menor acoplamiento** entre HTTP y persistencia.

## Autor

- **Nombre:** Erick Pérez
- **GitHub:** https://github.com/Erickpe8
- **Correo electrónico:** ericksperezc@gmail.com
