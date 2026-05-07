# 🏗️ Arquitecturas CRUD — Autores y Libros

![GitHub Repo Stats](https://img.shields.io/github/stars/Erickpe8/arquitecturas-crud-autores-libros?style=social)
![GitHub Forks](https://img.shields.io/github/forks/Erickpe8/arquitecturas-crud-autores-libros?style=social)

Este repositorio presenta la aplicación de **distintas arquitecturas de software** sobre **un mismo caso de uso**: un sistema **CRUD** de gestión de **autores** y **libros**, desarrollado con **Laravel 13**. El objetivo es que puedas **comparar**, en el mismo framework y dominio funcional, cómo cambia la **organización del código**, la **separación de responsabilidades** y el **acoplamiento** entre capas cuando se adopta cada patrón.

El comportamiento funcional base se mantiene alineado entre ramas: altas y bajas, **listados con búsqueda y filtros**, **relaciones** autor–libro, datos de **géneros** y una **pantalla de inicio** con métricas agregadas (totales y género más frecuente). Así las diferencias que observas son **principalmente estructurales y de flujo interno**, no de pantallas inventadas para cada rama.

La rama **`main`** cumple un rol de **punta de entrada documental**: aquí encontrás esta guía y el `.gitignore`. El **código ejecutable** de Laravel (`app/`, `routes/`, `database/`, `resources/`, etc.) está en las ramas nombradas según la arquitectura (`mvc`, `repository-pattern`, y así sucesivamente). Para ejecutar el proyecto necesitás **clonar**, **cambiar de rama** y seguir los pasos de instalación indicados más abajo.

---

## 📁 Arquitecturas implementadas

A continuación se listan las arquitecturas aplicadas, con una breve descripción y el enlace directo a la rama correspondiente del repositorio:

1. **[Modelo – Vista – Controlador (MVC)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/mvc)**  
   Estructura básica y habitual en Laravel: **controladores**, **modelos Eloquent** y **vistas Blade**. Es la **línea base** para contrastar con el resto de variantes.

2. **[Repository Pattern](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/repository-pattern)**  
   Añade una **capa de repositorios** detrás de **interfaces**. Los controladores dependen del contrato y las implementaciones concentran el acceso a datos sobre los modelos.

3. **[Service Layer](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/service-layer)**  
   Introduce **servicios de aplicación** que encapsulan coordinación, consultas y reglas reutilizables; los controladores delegan en ellos y se mantienen más delgados.

4. **[Domain-Driven Design (DDD)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/domain-driven-design)**  
   Organiza el código por **subdominios** (`Author`, `Book`) bajo `App\Domains`, agrupando en cada uno controladores, modelos, repositorios, requests y servicios relacionados.

5. **[Hexagonal Architecture (Ports and Adapters)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/hexagonal-architecture)**  
   Centra el diseño en **casos de uso**, **dominio** y **puertos** (interfaces salientes); la infraestructura (Eloquent, almacenamiento de ficheros, etc.) actúa como **adaptadores** enlazados en el contenedor.

6. **[CQRS (Command Query Responsibility Segregation)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/cqrs)**  
   Separa explícitamente **consultas** (`Queries` + handlers) y **comandos** (`Commands` + handlers). Los controladores construyen el mensaje y lo despachan al manejador correspondiente.

7. **[Clean Architecture](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/clean-architecture)**  
   Organiza por **capas orientadas al dominio**: entidades, DTOs, interfaces de repositorio y almacenamiento, **casos de uso** y adaptadores de infraestructura, con la regla de dependencia hacia adentro.

---

## 🚀 ¿Cómo usar este repositorio?

1. **Cloná el repositorio**

   ```bash
   git clone https://github.com/Erickpe8/arquitecturas-crud-autores-libros.git
   cd arquitecturas-crud-autores-libros
   ```

2. **Elegí la arquitectura** y cambiá a esa rama (reemplazá `nombre-de-la-rama` por una de la lista anterior, por ejemplo `mvc` o `clean-architecture`):

   ```bash
   git checkout nombre-de-la-rama
   ```

3. **Instalá dependencias de PHP y del frontend**

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Configurá el entorno**: copiá el ejemplo de entorno y generá la clave de aplicación.

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Editá `.env` y definí la conexión a tu base de datos (**MySQL** u otro motor compatible que hayas configurado).

5. **Creá las tablas y cargá datos de prueba** (recomendado para ver listados, búsquedas y relaciones sin cargar datos a mano):

   ```bash
   php artisan migrate --seed
   ```

   Los seeders (`AuthorSeeder`, `GeneroSeeder`, `BookSeeder`) incluyen **autores conocidos**, **géneros** y **del orden de un centenar de libros** con ISBN y vínculos válidos a autores.

6. **Levantá el servidor de desarrollo**

   ```bash
   php artisan serve
   ```

   Abrí en el navegador la URL que indique la consola (por defecto `http://127.0.0.1:8000`).

---

## 🤖 Tecnologías usadas

Las ramas con código Laravel comparten en esencia el mismo stack. A nivel de referencia para este repositorio:

- **PHP 8.3 o superior** (`^8.3` según `composer.json` de las ramas de aplicación): lenguaje del backend.
- **Laravel 13**: framework PHP sobre el que se montan todas las variantes arquitectónicas.
- **MySQL**: motor relacional previsto para persistencia (podés usar otro compatible configurando `.env`).
- **Eloquent ORM**: capa de acceso a datos en las ramas que persisten con los modelos de Laravel.
- **Blade**: motor de plantillas para las vistas HTML del CRUD y el panel inicial.
- **Tailwind CSS**: estilos utility-first integrados vía el pipeline del proyecto (recursos en `resources/css`).
- **Vite**: empaquetado y recarga en desarrollo para CSS y JS del frontend.
- **Composer**: gestión de dependencias PHP.
- **npm**: gestión de dependencias del frontend.
- **Git** y **GitHub**: control de versiones y alojamiento del código.

Si desarrollás en Windows, entornos como **Laragon**, **XAMPP** o contenedores son válidos siempre que cumplas los requisitos de PHP y Node para Laravel 13.

---

## 📚 ¿Por qué comparar arquitecturas?

Comparar varias arquitecturas sobre **el mismo dominio** reduce variables: el problema de negocio es el mismo, cambia **cómo repartís responsabilidades**. Eso ayuda a:

- ver **dónde viven** las consultas, las reglas y los efectos secundarios;
- evaluar **mantenibilidad** y coste de cambio cuando crece el código;
- discutir **desacoplamiento** frente a **simplicidad** sin idealizar un único “mejor” patrón para todos los equipos;
- practicar lectura de **árboles de carpetas** y **flujos request → respuesta** en Laravel.

Este repositorio está pensado como **material de estudio y referencia técnica**, no como plantilla obligatoria para producción.

---

## Muchas gracias por llegar hasta aquí

Si te interesa profundizar en el proyecto o tenés dudas sobre la instalación, podés escribirme por correo a **ericksperezc@gmail.com** o por las redes enlazadas desde mi perfil de GitHub.

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar el repositorio!

---

## Autor

- **Nombre:** Erick Pérez  
- **GitHub:** [https://github.com/Erickpe8](https://github.com/Erickpe8)  
- **Correo electrónico:** ericksperezc@gmail.com  
