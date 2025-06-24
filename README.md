# ⚔️ Arquitectura: CQRS (Command Query Responsibility Segregation)

## 📁 Estructura de Carpetas
<div align="center">
  <img src="https://github.com/user-attachments/assets/d61d2848-c223-4f1f-88da-bc4af2f719f3" alt="CQRS Diagram" width="600">
</div>

## 🧠 Descripción General

**CQRS** es un patrón arquitectónico que **separa las operaciones de lectura (queries)** de las de **escritura (commands)**. A diferencia de una arquitectura tradicional donde un mismo método o clase puede encargarse de ambas, CQRS propone dividir claramente ambas responsabilidades.

Este enfoque se puede aplicar dentro de arquitecturas como Clean o Hexagonal.

## 🧩 Funciones de Cada Capa

- **Commands (escritura)**: Contienen la lógica para crear, actualizar o eliminar datos.
- **Queries (lectura)**: Encargados de obtener y devolver datos al sistema sin modificarlos.
- **Controllers**: Redireccionan cada operación al comando o consulta correspondiente.
- **Repository Interface & Implementation**: Mantienen la conexión con la base de datos según cada acción.

## ✅ Ventajas

- Separa responsabilidades, lo que mejora la organización del código.
- Permite optimizar las lecturas y escrituras por separado.
- Facilita el escalado independiente de queries y commands.
- Mejora la mantenibilidad en sistemas grandes.


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
