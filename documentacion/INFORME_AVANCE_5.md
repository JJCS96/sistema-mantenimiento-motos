# Informe del avance 5

## Introduccion

Este informe resume la revision tecnica, correcciones y documentacion elaborada para el avance 5 del sistema de mantenimiento de motos.

## Objetivo del avance

Dejar el proyecto preparado para entrega academica con validaciones basicas, proteccion de sesiones y documentacion ordenada.

## Estado inicial

Al iniciar la revision, el proyecto ya contaba con una base MVC funcional, pero presentaba oportunidades de mejora en seguridad, mensajes de error, control de dependencias y documentacion.

## Actividades realizadas

- Revision de la estructura del proyecto.
- Identificacion del punto de entrada y del flujo de rutas.
- Revision de modelos, controladores, vistas y SQL.
- Ajuste de la conexion a base de datos.
- Creacion de un guard reutilizable de sesiones.
- Validacion de duplicados y dependencias en clientes y motos.
- Validacion basica de repuestos y mantenimientos.
- Mejora de mensajes visuales con SweetAlert2.
- Elaboracion de la documentacion del avance 5.
- Actualizacion del README principal.

## Correcciones realizadas

- Se centralizo la validacion de sesion en `includes/validar_sesion.php`.
- Se agrego control de duplicados de cédula y placa.
- Se impidio eliminar clientes o motos con relaciones activas.
- Se agregaron validaciones basicas de datos faltantes o negativos.
- Se mejoro el manejo del error de conexion a la base de datos.
- Se corrigio la nota de la contraseña inicial en el script SQL.

## Modulos revisados

- Autenticacion.
- Dashboard.
- Clientes.
- Motos.
- Mantenimientos.
- Repuestos.
- Reportes.
- Base de datos.

## Resultados de las pruebas

- Revision sintactica PHP: correcta.
- Conexion MySQL en este entorno: no verificada de forma funcional por un error de autenticacion del servidor observado durante la prueba.
- Flujo web completo: pendiente de verificacion manual en el XAMPP del grupo.

## Porcentaje general

El avance general estimado es de 86%.

## Documentacion elaborada

- `documentacion/PLAN_MANTENIMIENTO.md`
- `documentacion/INSTRUCCIONES_EJECUCION.md`
- `documentacion/BITACORA_AVANCE_5.md`
- `documentacion/INFORME_AVANCE_5.md`
- `documentacion/PRUEBAS_FUNCIONALES.md`

## Trabajo pendiente

- Pruebas funcionales manuales en el equipo del grupo.
- Ajuste final de reportes si se requiere mayor detalle.
- Verificacion de credenciales y acceso a la base de datos en el entorno de entrega.

## Conclusion

El proyecto quedo mejor estructurado y documentado para su entrega. Las correcciones aplicadas fortalecen la estabilidad general y facilitan la revision academica del sistema.
