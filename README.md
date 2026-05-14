# Sistema Web de Mantenimiento de Motos

Proyecto académico desarrollado en PHP puro con MySQL para gestionar clientes, motos y mantenimientos de un taller de motocicletas.

## Avance 1

En este primer avance se implementó la base funcional del sistema.

### Funcionalidades incluidas

- Inicio de sesión de usuario.
- Cierre de sesión.
- Dashboard con datos reales.
- Gestión de clientes.
- Gestión de motos.
- Gestión de mantenimientos.
- Alertas con SweetAlert2.
- Diseño con Bootstrap 5.
- Menú lateral de navegación.
- Arquitectura MVC sencilla.

## Tecnologías utilizadas

- PHP puro
- MySQL
- HTML
- CSS
- JavaScript
- Bootstrap 5
- Bootstrap Icons
- SweetAlert2
- XAMPP
- Visual Studio Code

## Estructura del proyecto

```text
sistema-mantenimiento-motos/
│
├── config/
│   ├── config.php
│   └── conexion.php
│
├── controllers/
│   ├── AuthController.php
│   ├── ClienteController.php
│   ├── MotoController.php
│   └── MantenimientoController.php
│
├── models/
│   ├── Usuario.php
│   ├── Cliente.php
│   ├── Moto.php
│   └── Mantenimiento.php
│
├── views/
│   ├── auth/
│   ├── clientes/
│   ├── motos/
│   ├── mantenimientos/
│   ├── layouts/
│   └── dashboard.php
│
├── public/
│   ├── css/
│   └── js/
│
├── database/
│   └── sistema_motos.sql
│
├── index.php
└── README.md