
# arquitecturas-crud-autores-libros

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

5. **[Hexagonal Architecture (Ports and Adapters)](https://github.com/Erickpe8/arquitecturas-crud-autores-libros/tree/hexagonal)**  
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

3. Instala las dependencias:

   ```bash
   composer install
   npm install && npm run dev
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

## 📚 ¿Por qué comparar arquitecturas?

Comparar arquitecturas con un mismo caso de uso permite:

- Entender cómo cambia la estructura del código con cada enfoque.
- Visualizar la separación de responsabilidades.
- Evaluar qué tan escalable o mantenible es cada arquitectura.
- Analizar la claridad en el flujo de datos y lógica de negocio.

---

## 🧑‍💻 Autor

**Erick Pérez**  
GitHub: [@Erickpe8](https://github.com/Erickpe8)
