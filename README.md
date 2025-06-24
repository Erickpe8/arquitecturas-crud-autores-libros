# 🧱 Arquitectura MVC (Model-View-Controller)

## 📂 Estructura de carpetas
![image](https://github.com/user-attachments/assets/6e881d39-c08d-4f78-8822-cc50db7e50be)

---

## 🧠 Descripción general

La arquitectura **MVC** (Modelo-Vista-Controlador) es un patrón clásico utilizado para aplicaciones web, que para nuestra suerte ya viene por defecto implementado dentro de Laravel, este divide la aplicación en tres capas principales:

- **Modelo (Model):** Encargado de la lógica de acceso a los datos y las reglas del negocio.
- **Vista (View):** Presenta los datos al usuario mediante HTML/Blade.
- **Controlador (Controller):** Gestiona las solicitudes HTTP, orquesta la lógica básica y conecta el modelo con la vista.

---

## 🛠️ Función de cada capa

| Capa       | Rol                                                                 |
|------------|----------------------------------------------------------------------|
| **Model**      | Define la estructura de datos (por ejemplo, `Autor`) y se comunica con la base de datos mediante Eloquent. |
| **View**       | Renderiza interfaces (Blade) para mostrar y capturar información. |
| **Controller** | Recibe la solicitud, ejecuta validaciones, llama al modelo y envía la vista correspondiente. |

---

## ✅ Ventajas

- Simplicidad: Fácil de entender e implementar.
- Rápida para desarrollar prototipos.
- Todo está integrado directamente con Laravel.

---

## ⚠️ Desventajas

- Poca separación de responsabilidades en controladores grandes.
- El modelo puede volverse monolítico al crecer la lógica.
- No escala bien en sistemas grandes.

---


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
