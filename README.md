# 🧩 Arquitectura: MVC (Modelo - Vista - Controlador)

## 🧠 Descripción General

**MVC** (Model-View-Controller) es uno de los patrones arquitectónicos más clásicos y utilizados en el desarrollo de aplicaciones web. Su principal objetivo es separar las responsabilidades en tres componentes principales:

- **Modelo (Model):** Se encarga de gestionar los datos, lógica de negocio y acceso a la base de datos.
- **Vista (View):** Es la capa de presentación. Define cómo se muestran los datos al usuario.
- **Controlador (Controller):** Actúa como intermediario entre el modelo y la vista, manejando las solicitudes del usuario, invocando lógica del modelo y retornando una vista adecuada.

En este CRUD de autores y libros, MVC permite:
- Tener una organización clara de responsabilidades.
- Facilitar el desarrollo rápido gracias a la simplicidad del patrón.
- Permitir un buen punto de inicio antes de escalar a arquitecturas más complejas como DDD o CQRS.
- Reducir el acoplamiento entre la lógica de negocio y la interfaz de usuario.

---

## 🧩 Funciones de Cada Capa

- **Models:** Contienen las clases Eloquent que representan las tablas de la base de datos.
- **Controllers:** Manejan las rutas, validaciones y lógica de conexión entre vista y modelo.
- **Views:** Plantillas Blade que renderizan la interfaz de usuario.

---

# 📚 Estructura de carpetas

## 📂 app/Http/Controllers

| Archivo                | Función                                                                 |
|------------------------|-------------------------------------------------------------------------|
| `AutorController.php`  | Maneja todas las acciones (index, create, store, edit, update, destroy) de autores. |
| `LibroController.php`  | Controlador para la gestión de libros.                                 |
| `Controller.php`       | Clase base de la cual heredan los demás controladores.                  |

---

## 📂 app/Models

| Archivo         | Función                                                    |
|-----------------|-------------------------------------------------------------|
| `Autor.php`     | Modelo Eloquent que representa la entidad Autor.           |
| `Libro.php`     | Modelo Eloquent que representa la entidad Libro.           |

---

## 📂 resources/views/autores

| Archivo                | Función                                          |
|------------------------|--------------------------------------------------|
| `index.blade.php`      | Muestra la lista de autores.                     |
| `create.blade.php`     | Formulario para crear un nuevo autor.            |
| `edit.blade.php`       | Formulario para editar un autor existente.       |

---

## 📂 resources/views/libros

| Archivo                | Función                                          |
|------------------------|--------------------------------------------------|
| `index.blade.php`      | Muestra la lista de libros.                      |
| `create.blade.php`     | Formulario para registrar un nuevo libro.        |
| `edit.blade.php`       | Formulario para modificar un libro existente.    |

---

# ✅ Ventajas

- Fácil de entender y aplicar, ideal para proyectos pequeños y medianos.
- Estructura básica que permite crecer hacia arquitecturas más avanzadas.
- Rápido desarrollo con herramientas de Laravel como Eloquent y Blade.
- Excelente para prototipos o MVPs (productos mínimos viables).

---


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
