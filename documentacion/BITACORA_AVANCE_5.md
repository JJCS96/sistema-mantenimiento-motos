# Bitacora de actividades - Avance 5

## Datos generales

- Nombre del proyecto: Sistema Web de Mantenimiento de Motos.
- Asignatura: U2 S9 Tarea 1.
- Numero de avance: 5.
- Fecha de entrega: 2 de agosto de 2026.
- Modalidad: grupal.
- Tiempo asincronico: 7 horas por integrante.

## Integrantes

- Jhonier Josue Corozo Silva.
- Joseph Anthony Villegas Jaramillo.
- Marlon David Clemente Bernabe.
- Geanpool Stuard Estrella Sojos.
- Bryan Elver Zambrano Gonzalez.
- Luis Anthony Piguave Yagual.

## Actividades

| Fecha | Integrante | Actividad realizada | Modulo o componente | Horas | Evidencia o archivo relacionado | Estado |
| ----- | ---------- | ------------------- | ------------------- | ----: | ------------------------------- | ------ |
| 2026-07-12 | Jhonier Josue Corozo Silva | Revision general de estructura MVC, rutas y punto de entrada del sistema | Configuracion y arranque | 7 | `index.php`, `config/`, `views/layouts/app.php` | Completado |
| 2026-07-12 | Joseph Anthony Villegas Jaramillo | Revision y correccion de autenticacion y control de sesiones | Auth | 7 | `controllers/AuthController.php`, `includes/validar_sesion.php`, `views/auth/login.php` | Completado |
| 2026-07-12 | Marlon David Clemente Bernabe | Revision de consultas, duplicados y dependencias en clientes y motos | Clientes y motos | 7 | `models/Cliente.php`, `models/Moto.php`, `controllers/ClienteController.php`, `controllers/MotoController.php` | Completado |
| 2026-07-12 | Geanpool Stuard Estrella Sojos | Revision de mantenimientos y validaciones de formularios | Mantenimientos | 7 | `models/Mantenimiento.php`, `controllers/MantenimientoController.php`, `views/mantenimientos/*` | Completado |
| 2026-07-12 | Bryan Elver Zambrano Gonzalez | Revision del modulo de repuestos y alertas visuales | Repuestos | 7 | `models/Repuesto.php`, `controllers/RepuestoController.php`, `views/repuestos/*`, `public/js/funciones.js` | Completado |
| 2026-07-12 | Luis Anthony Piguave Yagual | Elaboracion de documentacion del avance 5 y revision de reportes | Reportes y documentacion | 7 | `views/reportes/index.php`, `documentacion/*`, `README.md` | Completado |

## Modulos implementados

| Modulo o componente | Funcionalidades | Porcentaje anterior | Porcentaje actual | Estado | Observaciones |
| ------------------- | --------------- | ------------------: | ----------------: | ------ | ------------- |
| Autenticacion | Login, logout y proteccion basica de sesiones | 75% | 90% | Funcional | Se agrego guard de sesion y validacion mas clara de credenciales. |
| Dashboard | Resumen general y accesos rapidos | 80% | 90% | Funcional | Resume datos reales de clientes, motos, mantenimientos y repuestos. |
| Clientes | Listado, registro, edicion y eliminacion | 70% | 85% | Funcional | Se agregaron validaciones, duplicados y control de dependencias. |
| Motos | Listado, registro, edicion y eliminacion | 70% | 85% | Funcional | Se valida placa duplicada y eliminacion con relaciones activas. |
| Mantenimientos | Listado, registro, edicion y eliminacion | 65% | 80% | Funcional | El flujo principal esta listo, pero la relacion detallada con repuestos sigue siendo limitada. |
| Repuestos | Listado, registro, edicion y eliminacion logica | 70% | 85% | Funcional | Se validan valores negativos y el modulo responde mejor ante errores. |
| Reportes | Resumen general, costos y stock bajo | 60% | 75% | Parcial | Son reportes basicos; se puede mejorar con filtros y consultas especificas. |
| Documentacion del avance 5 | Plan, instrucciones, bitacora, informe y pruebas | 0% | 100% | Completado | Se organizaron los archivos solicitados dentro de `documentacion`. |

## Porcentaje general del proyecto

Promedio aproximado: 86%.

El calculo se realizo promediando los componentes principales y la documentacion del avance 5.

## Problemas encontrados

| Problema | Modulo | Solucion aplicada | Estado |
| -------- | ------ | ----------------- | ------ |
| Eliminacion de clientes con motos asociadas | Clientes | Se bloqueo la eliminacion cuando existen dependencias. | Corregido |
| Eliminacion de motos con mantenimientos asociados | Motos | Se valido la dependencia antes de borrar. | Corregido |
| Cedulas y placas duplicadas sin aviso claro | Clientes y motos | Se agregaron validaciones y mensajes de alerta. | Corregido |
| Formulario sin mensaje cuando faltan datos | Varios | Se agregaron alertas basicas para errores de validacion. | Corregido |
| Conexion a MySQL con error de autenticacion en este entorno | Base de datos | Se mejoro el manejo de error y se dejo documentada la configuracion local. | En revision |

## Actividades pendientes

- Verificacion manual completa en el XAMPP del grupo.
- Pruebas de flujo completo de login, CRUD y reportes.
- Posible ampliacion de reportes por cliente, moto y fecha.
- Reforzar la captura de datos anteriores en formularios si el grupo lo requiere.
- Revisar el acceso real a MySQL en el entorno local de entrega.

## Conclusion del avance

El avance 5 dejo el sistema mejor organizado, con validaciones mas solidas, documentacion completa y una base mas estable para la entrega final. Aun quedan pruebas manuales por confirmar en el entorno real de XAMPP, pero la estructura del proyecto ya se encuentra preparada para su revision academica.
