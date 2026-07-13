# Pruebas funcionales

## Nota

Las pruebas funcionales completas no se pudieron ejecutar en este entorno debido al problema de autenticacion observado al intentar conectar MySQL desde PHP. Por eso, la mayoria de los casos se dejan como pendientes para verificacion manual en el XAMPP del grupo.

| Codigo | Modulo | Caso de prueba | Datos utilizados | Resultado esperado | Resultado obtenido | Estado |
| ------ | ------ | -------------- | ---------------- | ------------------ | ------------------ | ------ |
| PF-001 | Autenticacion | Inicio de sesion correcto | `admin` / `1234` | Acceso al dashboard | Pendiente de ejecucion manual | Pendiente |
| PF-002 | Autenticacion | Inicio con clave incorrecta | `admin` / `xxxx` | Mostrar mensaje de error | Pendiente de ejecucion manual | Pendiente |
| PF-003 | Clientes | Registro de cliente | Cédula, nombres, apellidos y demas datos | Cliente almacenado | Pendiente de ejecucion manual | Pendiente |
| PF-004 | Clientes | Cédula duplicada | Cédula ya registrada | Mostrar validacion | Pendiente de ejecucion manual | Pendiente |
| PF-005 | Motos | Registro de motocicleta | Cliente, placa, marca, modelo | Moto almacenada | Pendiente de ejecucion manual | Pendiente |
| PF-006 | Motos | Placa duplicada | Placa ya registrada | Mostrar validacion | Pendiente de ejecucion manual | Pendiente |
| PF-007 | Mantenimientos | Registro de mantenimiento | Moto, fecha, descripcion, costo, estado | Mantenimiento almacenado | Pendiente de ejecucion manual | Pendiente |
| PF-008 | Mantenimientos | Edicion de mantenimiento | Datos editados | Registro actualizado | Pendiente de ejecucion manual | Pendiente |
| PF-009 | Mantenimientos | Eliminacion de mantenimiento | ID de mantenimiento | Registro eliminado | Pendiente de ejecucion manual | Pendiente |
| PF-010 | Repuestos | Registro de repuesto | Nombre, stock y precio | Repuesto almacenado | Pendiente de ejecucion manual | Pendiente |
| PF-011 | Reportes | Generacion de reportes | Resumen general | Mostrar tablas y totales | Pendiente de ejecucion manual | Pendiente |
| PF-012 | Autenticacion | Cierre de sesion | Sesion activa | Redireccion al login | Pendiente de ejecucion manual | Pendiente |
| PF-013 | Seguridad | Acceso a ruta privada sin sesion | URL del dashboard | Redireccion al login | Pendiente de ejecucion manual | Pendiente |
