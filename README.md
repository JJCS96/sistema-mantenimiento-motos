# Sistema Web de Mantenimiento de Motos

Proyecto académico desarrollado para la asignatura de **Diseño Detallado de Software**. El sistema permite gestionar información básica de un taller de motos, incluyendo el inicio de sesión, dashboard, clientes y motos como parte del **primer avance**.

---

## 1. Descripción del proyecto

El **Sistema Web de Mantenimiento de Motos** tiene como objetivo ayudar a un taller mecánico a organizar la información de sus clientes y las motos que ingresan al taller.

En este primer avance se implementa la base inicial del sistema, permitiendo al usuario iniciar sesión, acceder a un panel principal y administrar los módulos de clientes y motos.

---

## 2. Tecnologías utilizadas

- **Lenguaje backend:** PHP puro
- **Base de datos:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5 y JavaScript
- **Alertas:** SweetAlert2
- **Servidor local:** XAMPP
- **IDE seleccionado:** Visual Studio Code
- **Control de versiones:** Git y GitHub

---

## 3. Arquitectura del proyecto

El sistema utiliza una arquitectura **MVC sencilla con PHP puro**.

La estructura separa el proyecto en:

- **Modelos:** contienen las consultas a la base de datos.
- **Controladores:** reciben las acciones del usuario y llaman a los modelos.
- **Vistas:** muestran las pantallas del sistema.
- **Configuración:** contiene la conexión y rutas generales del sistema.
- **Recursos públicos:** contiene archivos CSS y JavaScript.

---

## 4. Módulos implementados en el primer avance

En este primer avance se desarrollaron los siguientes módulos:

1. **Login de usuario**
   - Inicio de sesión.
   - Cierre de sesión.
   - Validación básica de usuario y contraseña.

2. **Dashboard principal**
   - Pantalla inicial del sistema.
   - Tarjetas informativas.
   - Acceso a módulos principales.

3. **Módulo de clientes**
   - Listar clientes.
   - Registrar clientes.
   - Editar clientes.
   - Eliminar clientes de forma lógica.

4. **Módulo de motos**
   - Listar motos.
   - Registrar motos.
   - Editar motos.
   - Eliminar motos de forma lógica.
   - Asociar una moto con un cliente.

---

## 5. Estructura del proyecto

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
│   └── MotoController.php
│
├── models/
│   ├── Usuario.php
│   ├── Cliente.php
│   └── Moto.php
│
├── views/
│   ├── layouts/
│   │   └── app.php
│   │
│   ├── auth/
│   │   └── login.php
│   │
│   ├── clientes/
│   │   ├── index.php
│   │   ├── crear.php
│   │   └── editar.php
│   │
│   ├── motos/
│   │   ├── index.php
│   │   ├── crear.php
│   │   └── editar.php
│   │
│   └── dashboard.php
│
├── public/
│   ├── css/
│   │   └── estilos.css
│   └── js/
│       └── funciones.js
│
├── database/
│   └── sistema_motos.sql
│
└── index.php
```

---

## 6. Requisitos para ejecutar el proyecto

Antes de abrir el proyecto, se debe tener instalado:

- XAMPP
- Visual Studio Code
- Navegador web, por ejemplo Google Chrome
- Git, si se desea clonar el repositorio desde GitHub

---

## 7. Instrucciones para abrir el proyecto en Visual Studio Code

### Paso 1: Copiar el proyecto en XAMPP

Copiar la carpeta del proyecto dentro de la carpeta `htdocs` de XAMPP.

La ruta debe quedar así:

```text
C:\xampp\htdocs\sistema-mantenimiento-motos
```

---

### Paso 2: Abrir el proyecto en Visual Studio Code

1. Abrir **Visual Studio Code**.
2. Ir al menú **File**.
3. Seleccionar **Open Folder**.
4. Buscar la carpeta:

```text
C:\xampp\htdocs\sistema-mantenimiento-motos
```

5. Dar clic en **Select Folder**.

Con esto se abrirá todo el proyecto en el IDE.

---

### Paso 3: Iniciar XAMPP

1. Abrir el panel de control de XAMPP.
2. Activar el servicio **Apache**.
3. Activar el servicio **MySQL**.

Ambos deben aparecer en color verde.

---

### Paso 4: Crear la base de datos

1. Abrir el navegador.
2. Ingresar a:

```text
http://localhost/phpmyadmin
```

3. Crear una base de datos llamada:

```text
sistema_motos
```

4. Seleccionar la base de datos creada.
5. Ir a la pestaña **Importar**.
6. Seleccionar el archivo:

```text
database/sistema_motos.sql
```

7. Dar clic en **Continuar**.

Esto creará las tablas necesarias y los datos iniciales.

---

### Paso 5: Verificar la configuración del proyecto

Abrir el archivo:

```text
config/config.php
```

Verificar que la ruta base sea:

```php
define("BASE_URL", "http://localhost/sistema-mantenimiento-motos/");
```

Si la carpeta del proyecto tiene otro nombre, se debe cambiar la ruta en `BASE_URL`.

---

### Paso 6: Verificar la conexión a la base de datos

Abrir el archivo:

```text
config/conexion.php
```

La configuración por defecto para XAMPP es:

```php
private $host = "localhost";
private $usuario = "root";
private $password = "";
private $base_datos = "sistema_motos";
```

Si MySQL tiene otra contraseña, se debe modificar el valor de `$password`.

---

### Paso 7: Ejecutar el sistema en el navegador

Abrir el navegador e ingresar a:

```text
http://localhost/sistema-mantenimiento-motos
```

El sistema redirigirá automáticamente a la pantalla de login.

---

## 8. Usuario de prueba

Para ingresar al sistema se puede usar el siguiente usuario:

```text
Usuario: admin
Contraseña: 1234
```

Nota: En este primer avance la contraseña se está validando de forma temporal como texto plano para facilitar las pruebas del proyecto académico.

---

## 9. Funcionalidades disponibles

Después de iniciar sesión, el usuario podrá:

- Ver el dashboard principal.
- Ingresar al módulo de clientes.
- Registrar un nuevo cliente.
- Editar un cliente existente.
- Eliminar un cliente de forma lógica.
- Ingresar al módulo de motos.
- Registrar una nueva moto.
- Editar una moto existente.
- Eliminar una moto de forma lógica.
- Cerrar sesión.

---

## 10. Uso de SweetAlert2

El sistema utiliza **SweetAlert2** para mostrar alertas visuales en acciones como:

- Login incorrecto.
- Inicio de sesión exitoso.
- Cierre de sesión.
- Registro correcto.
- Actualización correcta.
- Eliminación correcta.
- Confirmación antes de eliminar un registro.

---

## 11. Comandos básicos de Git

Para guardar los cambios del primer avance en GitHub:

```bash
git add .
git commit -m "Avance 1: login dashboard clientes y motos"
git push
```

Si es la primera vez que se sube el proyecto:

```bash
git init
git add .
git commit -m "Estructura inicial del proyecto"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/sistema-mantenimiento-motos.git
git push -u origin main
```

Reemplazar `TU_USUARIO` por el usuario real de GitHub.

---

## 12. Estado del proyecto

Actualmente el proyecto se encuentra en el **primer avance**.

Módulos desarrollados:

- Login
- Dashboard
- Clientes
- Motos

Módulos pendientes para el segundo avance:

- Mantenimientos
- Repuestos
- Detalle de mantenimiento
- Reportes básicos
- Mejoras finales de validación y seguridad

---

## 13. Observaciones

Este proyecto fue desarrollado con fines académicos. La estructura se mantiene sencilla para facilitar la comprensión del código, pero aplicando una separación básica entre modelos, vistas y controladores.
