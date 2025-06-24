# 🧼 Arquitectura: Clean Architecture

## 📁 Estructura de Carpetas

<div align="center">
  <img src="https://github.com/user-attachments/assets/47dd8b24-5351-4c46-aa6c-f9998c5e902b" alt="clean architecture Diagram" width="600">
</div>

## 🧠 Descripción General

**Clean Architecture**, propuesta por Robert C. Martin, busca separar el código en capas concéntricas donde cada capa tiene una responsabilidad específica y depende solo de la anterior más interna. El corazón del sistema es el dominio, y la infraestructura es lo último.

Su lema es: _"Las reglas del negocio no deben conocer nada del mundo exterior."_.

## 🧩 Funciones de Cada Capa

- **Domain**: Define las entidades y los contratos (interfaces) que representan el corazón del negocio.
- **Application**: Contiene los casos de uso (UseCases), que definen lo que el sistema puede hacer.
- **Infrastructure**: Implementa adaptadores que interactúan con tecnologías externas como bases de datos.
- **Interfaces**: Encapsula la lógica de entrada/salida como controladores web, CLI o APIs.

## ✅ Ventajas

- Independencia de frameworks, UI y base de datos.
- Alta testabilidad: las reglas del negocio pueden probarse sin infraestructura.
- Alta mantenibilidad y escalabilidad.
- Permite cambiar la base de datos o interfaz sin afectar la lógica de negocio.


## Muchas gracias por llegar hasta aquí
Si estan interesados en conocer un poco más a fondo este proyecto o saber como realizar el proceso de instalación no duden en contactarme, lo pueden hacer por mis redes sociales las cuales aparecen en mi perfir de GitHub o via correo electronico ericksperezc@gmail.com

- 🎥 [YouTube](https://www.youtube.com/@ErickPerez_8)
- 📸 [Instagram](https://www.instagram.com/erickperez_8/)

¡Gracias por visitar mi perfil! 💻✨
