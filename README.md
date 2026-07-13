# Sistema Web de Mantenimiento de Motos

Proyecto academico desarrollado en PHP puro y MySQL para la gestion de clientes, motocicletas, mantenimientos, repuestos y reportes basicos de un taller.

## Descripcion

El sistema permite iniciar sesion, administrar catalogos principales, registrar mantenimientos y consultar un panel general con informacion resumida.

## Objetivo

Apoyar el control del mantenimiento de motocicletas mediante una aplicacion web sencilla, compatible con XAMPP y con arquitectura MVC basica.

## Tecnologias

- PHP 8+
- MySQL o MariaDB
- HTML5
- CSS
- JavaScript
- Bootstrap 5
- SweetAlert2
- XAMPP

## Arquitectura

- MVC basica.
- Separacion por controladores, modelos, vistas, configuracion e incluye layout principal.

## Funcionalidades

- Autenticacion de usuarios.
- Dashboard con resumen general.
- Gestion de clientes.
- Gestion de motocicletas.
- Gestion de mantenimientos.
- Gestion de repuestos.
- Reportes basicos.
- Eliminacion con confirmacion visual.

## Requisitos

- Windows.
- XAMPP instalado y ejecutando Apache y MySQL.
- PHP compatible.
- Navegador web moderno.
- Visual Studio Code opcional para edicion.

## Instalacion resumida

1. Copiar la carpeta del proyecto en `C:\xampp\htdocs\sistema-mantenimiento-motos`.
2. Iniciar Apache y MySQL desde XAMPP.
3. Crear la base de datos `sistema_motos` en phpMyAdmin.
4. Importar `database/sistema_motos.sql`.
5. Revisar `config/conexion.php` si la configuracion local usa otro usuario, clave o puerto.
6. Abrir `http://localhost/sistema-mantenimiento-motos/`.

## Acceso al sistema

- Usuario: `admin`
- Clave: `1234`

## Estructura de carpetas

- `config/`: configuracion general y conexion.
- `controllers/`: logica de acciones.
- `models/`: consultas a la base de datos.
- `views/`: pantallas del sistema.
- `public/`: CSS y JavaScript propios.
- `database/`: script SQL.
- `includes/`: componentes compartidos y validacion de sesion.
- `documentacion/`: entrega del avance 5.

## Base de datos

- Nombre: `sistema_motos`
- Archivo principal: `database/sistema_motos.sql`

## Modulos

- Autenticacion.
- Dashboard.
- Clientes.
- Motos.
- Mantenimientos.
- Repuestos.
- Reportes.

## Documentacion disponible

- [Plan de mantenimiento](documentacion/PLAN_MANTENIMIENTO.md)
- [Instrucciones de ejecucion](documentacion/INSTRUCCIONES_EJECUCION.md)
- [Bitacora del avance 5](documentacion/BITACORA_AVANCE_5.md)
- [Informe del avance 5](documentacion/INFORME_AVANCE_5.md)
- [Pruebas funcionales](documentacion/PRUEBAS_FUNCIONALES.md)

## Integrantes

- Jhonier Josue Corozo Silva.
- Joseph Anthony Villegas Jaramillo.
- Marlon David Clemente Bernabe.
- Geanpool Stuard Estrella Sojos.
- Bryan Elver Zambrano Gonzalez.
- Luis Anthony Piguave Yagual.

## Estado del proyecto

Proyecto funcional a nivel de codigo, con documentacion del avance 5 elaborada y validaciones basicas incorporadas.

## Porcentaje general del avance

84% aproximadamente.

## Licencia

Uso academico y educativo.
