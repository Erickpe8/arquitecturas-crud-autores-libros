# 🧱 Arquitectura: Service Layer

## 📁 Estructura de Carpetas
<div align="center">
  <img src="https://github.com/user-attachments/assets/b62f170d-7919-4b77-8e77-e8e02fdb7812" alt="Repository Pattern Diagram" width="600">
</div>

## 🧠 Descripción General

La arquitectura **Service Layer** introduce una capa intermedia (services) que contiene la lógica de negocio. Esta capa **organiza y centraliza** las reglas del negocio y permite que los controladores mantengan una función más simple, delegando procesos complejos a los servicios.

## 🧩 Funciones de Cada Capa

- **Domain**: Contiene las entidades (como `Autor`) que representan el modelo del negocio.
- **Infrastructure**: Contiene la lógica de acceso a datos (ORM, Eloquent, etc.).
- **Application (Services)**: Centraliza la lógica de negocio (crear, actualizar, listar, eliminar).
- **Interfaces/Web**: Controladores HTTP que llaman a los servicios para realizar acciones.

## ✅ Ventajas

- La lógica de negocio queda desacoplada de la interfaz de usuario y del acceso a datos.
- Permite reutilizar lógica entre diferentes interfaces (API, Web, CLI).
- Favorece la organización y testeo de la lógica de negocio.
- Simplifica los controladores.



