# 🏗️ Arquitecturas CRUD - Autores y Libros

![GitHub Repo Stats](https://img.shields.io/github/stars/Erickpe8/arquitecturas-crud-autores-libros?style=social)
![GitHub Forks](https://img.shields.io/github/forks/Erickpe8/arquitecturas-crud-autores-libros?style=social)

Este repositorio presenta la aplicación de **diferentes arquitecturas de software** dentro de un mismo proyecto CRUD desarrollado con **Laravel**. El objetivo es demostrar cómo varía la organización del código al aplicar distintos enfoques arquitectónicos, manteniendo la misma lógica de negocio: un sistema de gestión de autores y libros.

Este proyecto es ideal para entender las ventajas, desventajas y diferencias prácticas entre varias arquitecturas, todas contextualizadas en el mismo framework y caso de uso.

---

## 📁 Arquitecturas implementadas

A continuación se listan las arquitecturas aplicadas, con una breve descripción y un espacio para acceder a su respectiva rama del repositorio:

1. **[Modelo – Vista – Controlador (MVC)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/mvc)**  
   Estructura básica y tradicional de Laravel. Se organiza en controladores, modelos y vistas. Es el punto de partida para comparar con las demás arquitecturas.

2. **[Repository Pattern](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/repository-pattern)**  
   Introduce una capa intermedia entre el modelo y el controlador. Permite abstraer la lógica de acceso a datos, favoreciendo la reutilización y testabilidad.

3. **[Service Layer](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/service-layer)**  
   Añade una capa de servicios que encapsula la lógica de negocio. Los controladores delegan su funcionalidad en servicios, facilitando el mantenimiento.

4. **[Domain-Driven Design (DDD)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/domain-driven-design)**  
   Divide la aplicación en dominios específicos del negocio. Organiza las entidades, servicios, repositorios e interfaces bajo un mismo contexto.

5. **[Hexagonal Architecture (Ports and Adapters)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/hexagonal-architecture)**  
   Estructura el sistema alrededor de casos de uso. Separa la lógica interna de las dependencias externas mediante puertos y adaptadores.

6. **[CQRS (Command Query Responsibility Segregation)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/CQRS-(command-query-responsibility-segregation))**  
   Separa las operaciones de lectura (queries) y escritura (commands) en componentes distintos. Permite optimizar cada flujo de forma independiente.

7. **[Clean Architecture](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/clean-architecture)**  
   Propone una organización por capas concéntricas, donde el dominio no depende de tecnologías externas. Aísla la lógica del negocio del framework.

---

## 🚀 ¿Cómo usar este repositorio?

1. Clona el repositorio:

   ```bash
   git clone https://github.com/Erickpe8/arquitecturas-crud-autores-libros.git
   ```
   

2. Accede a la rama de la arquitectura que quieras explorar:

   ```bash
   git checkout nombre-de-la-rama
   ```
   solo debes remplazar al nombre de la rama que quieras trabajar en donde dice "nombre-de-la-rama"

3. Instala las dependencias:

   ```bash
   composer install
   npm install
   npm run dev
   ```

4. Crea y configura tu archivo `.env`:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Ejecuta las migraciones:

   ```bash
   php artisan migrate
   ```

---
## 🤖Tecnologias usadas

A continuación se detallan las principales tecnologías empleadas en el desarrollo del sistema:

- **PHP 8.1**: Lenguaje de programación principal para el backend.
- **Laravel 10**: Framework de PHP utilizado para estructurar la aplicación y facilitar el desarrollo con patrones como MVC, hexagonal y Clean Architecture.
- **MySQL**: Sistema de gestión de bases de datos relacional usado para el almacenamiento persistente de la información.
- **Composer**: Herramienta de gestión de dependencias para PHP.
- **Blade**: Motor de plantillas de Laravel utilizado para el frontend.
- **HTML5 y CSS3**: Lenguajes base para la estructura y estilo del sitio.
- **Git**: Sistema de control de versiones utilizado para el manejo del código fuente.
- **GitHub**: Plataforma para alojar el repositorio del proyecto y gestionar la colaboración.
- **Laragon**: Entorno de desarrollo local utilizado para correr la aplicación de forma eficiente.
---
## 📚 ¿Por qué comparar arquitecturas?

Comparar arquitecturas con un mismo caso de uso permite entender cómo varía la estructura del código con cada enfoque arquitectónico, visualizar la separación de responsabilidades, evaluar la escalabilidad y mantenibilidad de cada arquitectura, y analizar la claridad en el flujo de datos y la lógica de negocio.


---

## Muchas gracias por llegar hasta aqui 
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
