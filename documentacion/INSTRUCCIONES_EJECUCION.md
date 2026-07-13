# Instrucciones para abrir y ejecutar el proyecto

## Requisitos

- Windows.
- XAMPP.
- PHP compatible.
- MySQL o MariaDB.
- Visual Studio Code.
- Navegador web.

## Instalacion

1. Instalar XAMPP.
2. Verificar que la carpeta del proyecto se encuentre en `C:\xampp\htdocs\sistema-mantenimiento-motos`.
3. Iniciar Apache y MySQL desde el panel de XAMPP.
4. Abrir phpMyAdmin.
5. Crear la base de datos con el nombre `sistema_motos`.
6. Importar el archivo `database/sistema_motos.sql`.
7. Revisar los datos de conexion en `config/conexion.php`.
8. Abrir la carpeta del proyecto en Visual Studio Code.
9. Ingresar en el navegador a `http://localhost/sistema-mantenimiento-motos/`.

## Configuracion de la base de datos

- Archivo de conexion: `config/conexion.php`
- Base de datos: `sistema_motos`
- Usuario: `root`
- Contraseña: sin contraseña en la configuracion local usada como referencia
- Host: `localhost`
- Puerto: `3306`

## Credenciales de prueba

El script SQL incluye un usuario de prueba:

- Usuario: `admin`
- Clave: `1234`

Si el grupo crea nuevos usuarios, debe hacerlo directamente desde la base de datos o desde una extension futura del modulo de usuarios.

## Solucion de errores comunes

- Apache no inicia: revisar el puerto 80 o 443 en uso.
- MySQL no inicia: revisar si otro servicio usa el puerto 3306.
- Error de conexion: verificar usuario, clave, host y base de datos.
- Base de datos inexistente: crear `sistema_motos` e importar el SQL.
- Pagina 404: confirmar que la ruta correcta sea `http://localhost/sistema-mantenimiento-motos/`.
- Sesion no iniciada: volver al login y verificar credenciales.
- Carpeta del proyecto incorrecta: mover el proyecto a `C:\xampp\htdocs\sistema-mantenimiento-motos`.
- Puerto ocupado: cambiar el puerto en XAMPP o liberar el que esta en uso.
- Error al importar SQL: revisar que la base de datos este seleccionada.
- Extensiones de PHP faltantes: activar `mysqli` en `php.ini`.

## Estructura del proyecto

- `config/`: conexion y constantes.
- `controllers/`: acciones del sistema.
- `models/`: consultas SQL.
- `views/`: formularios, listas y dashboard.
- `public/`: CSS y JavaScript.
- `database/`: script SQL.
- `includes/`: validacion de sesion.
- `documentacion/`: archivos del avance 5.
