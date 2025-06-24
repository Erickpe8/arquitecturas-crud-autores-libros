# 🧱 Arquitectura: Hexagonal (Ports and Adapters)

## 📁 Estructura de Carpetas
<div align="center">
  <img src="https://github.com/user-attachments/assets/e85ab584-6bab-4999-be95-78771087db3d" alt="Repository Pattern Diagram" width="600">
</div>


## 🧠 Descripción General

La arquitectura **Hexagonal** (también conocida como **Ports and Adapters**) busca desacoplar completamente el núcleo de la aplicación de las tecnologías externas. La lógica del negocio se comunica a través de **puertos (interfaces)** con el mundo exterior, que se conecta mediante **adaptadores (implementaciones concretas)**.

## 🧩 Funciones de Cada Capa

- **Domain**: Define las entidades y las interfaces (puertos) que abstraen la lógica del negocio.
- **Application**: Contiene los **casos de uso** que representan las acciones del sistema.
- **Infrastructure**: Implementa los adaptadores que conectan el sistema con tecnologías externas (por ejemplo, Eloquent para persistencia).
- **Interfaces**: Expone la aplicación a través de interfaces como Web o API (controladores).

## ✅ Ventajas

- Total separación entre lógica de negocio y detalles técnicos.
- Fácil de testear: se pueden probar casos de uso sin necesidad de infraestructura.
- Sólido para proyectos grandes y escalables.
- Adaptable a cambios tecnológicos (cambiar de base de datos, framework, etc.).


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
