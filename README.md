# 🧱 Arquitectura: Domain-Driven Design (DDD)

## 📁 Estructura de Carpetas

<div align="center">
  <img src="https://github.com/user-attachments/assets/dd52e323-dd93-4221-a94a-733ab54ce1df" alt="Repository Pattern Diagram" width="600">
</div>

## 🧠 Descripción General

**Domain-Driven Design (DDD)** es un enfoque centrado en el dominio del negocio. Divide el sistema en capas bien diferenciadas y basa el diseño en los comportamientos, reglas y relaciones del negocio real. DDD no es una arquitectura por sí sola, sino una filosofía que puede aplicarse sobre arquitecturas como Clean o Hexagonal.

## 🧩 Funciones de Cada Capa

- **Domain**: Contiene las reglas del negocio puras. Incluye entidades, interfaces de repositorio y servicios de dominio (Domain Services).
- **Application**: Contiene los servicios de aplicación que coordinan la lógica de negocio, usan DTOs, y orquestan operaciones entre entidades y repositorios.
- **Infrastructure**: Implementa los detalles técnicos, como el acceso a la base de datos.
- **Interfaces**: Expone el sistema al mundo exterior (controladores, APIs, CLI).

## ✅ Ventajas

- Refleja fielmente la lógica del negocio.
- Facilita la comunicación entre desarrolladores y expertos del dominio.
- Escalable y modular, ideal para sistemas complejos.
- Fomenta buenas prácticas como uso de interfaces, separación de responsabilidades y pruebas unitarias.


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨

