# 🗂 Arquitectura: Repository Pattern

## 📁 Estructura de Carpetas

<div align="center">
  <img src="https://github.com/user-attachments/assets/4f7795d3-8c5b-4033-956e-3b09fccc961d" alt="image" width="600">
</div>

## 🧠 Descripción General

El patrón **Repository** actúa como intermediario entre la lógica de negocio y la capa de persistencia. Su objetivo es **abstraer el acceso a los datos**, desacoplando la lógica del negocio del motor de base de datos u ORM utilizado.

## 🧩 Funciones de Cada Capa

- **Domain**: Define las entidades y las interfaces que representan los contratos de acceso a datos.
- **Infrastructure**: Implementa esos contratos usando una tecnología específica (por ejemplo, Eloquent).
- **Application**: Orquesta la lógica del negocio utilizando los repositorios.
- **Interfaces/Web**: Contiene los controladores que gestionan las peticiones HTTP y respuestas.

## ✅ Ventajas

- Separa responsabilidades claramente.
- Permite cambiar el motor de base de datos sin alterar el dominio.
- Mejora el mantenimiento y la escalabilidad del código.

## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
