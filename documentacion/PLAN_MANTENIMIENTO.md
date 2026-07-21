# Plan de mantenimiento del sistema de mantenimiento de motocicletas

## 1. Introduccion

El sistema de mantenimiento de motocicletas permite registrar clientes, motos, mantenimientos, repuestos y reportes basicos de un taller. Mantenerlo operativo es importante para evitar perdida de informacion, errores en los procesos y fallos en la atencion diaria.

## 2. Objetivo del plan

Definir acciones para conservar la estabilidad, seguridad, compatibilidad y funcionamiento del sistema durante su uso academico y su posible extension futura.

## 3. Alcance

Este plan cubre:

- Codigo PHP.
- Base de datos.
- Interfaz web.
- Controladores.
- Modelos.
- Vistas.
- Reportes.
- Archivos de configuracion.
- Dependencias del navegador.
- Servidor local XAMPP.
- Respaldo de la base de datos.

## 4. Tipos de mantenimiento

### Mantenimiento correctivo

Se aplica cuando ya existe un error detectado durante el uso del sistema.

Ejemplos:

- Error al eliminar un cliente o una moto con relaciones activas.
- Error al registrar una placa duplicada.
- Consulta SQL incorrecta.
- Pagina que no carga.
- Problemas con las sesiones.

### Mantenimiento preventivo

Se aplica para reducir la probabilidad de fallos futuros.

Ejemplos:

- Respaldo periodico de la base de datos.
- Revision de validaciones en formularios.
- Comentarios utiles en el codigo.
- Eliminacion de codigo repetido cuando sea seguro.
- Pruebas de formularios antes de entregar cambios.
- Revision basica de seguridad.

### Mantenimiento adaptativo

Permite que el sistema siga funcionando en nuevos entornos.

Ejemplos:

- Ajustes por actualizacion de PHP.
- Ajustes por actualizacion de MySQL o MariaDB.
- Compatibilidad con nuevas versiones de XAMPP.
- Adaptacion a navegadores modernos.
- Cambios por rutas o puertos del servidor.

### Mantenimiento perfectivo

Incluye mejoras sobre funciones existentes.

Ejemplos:

- Mejorar reportes.
- Agregar filtros de busqueda.
- Optimizar consultas.
- Mejorar el diseño responsivo.
- Reducir pasos al registrar un mantenimiento.

## 5. Politica de mantenimiento

- Todo error debe registrarse antes de corregirse.
- Los cambios deben probarse antes de incorporarse.
- No se debe modificar una funcion estable sin revisar sus dependencias.
- Se debe crear un respaldo de la base de datos antes de cambios importantes.
- Las consultas deben usar sentencias preparadas.
- Los datos sensibles no deben almacenarse en texto plano cuando exista una alternativa compatible.
- Los cambios relevantes deben documentarse.
- Se debe conservar compatibilidad con el entorno establecido.
- El codigo nuevo debe incluir comentarios explicativos.
- Se deben revisar formularios, reportes y relaciones de base de datos despues de cada modificacion.

## 6. Clasificacion de incidencias

| Prioridad | Descripcion | Ejemplo | Tiempo de atencion |
| --------- | ----------- | ------- | ------------------ |
| Critica | Impide utilizar el sistema | No se puede iniciar sesion | Inmediato |
| Alta | Afecta un modulo principal | No se puede registrar un mantenimiento | Dentro de 24 horas |
| Media | Existe una alternativa temporal | Un filtro de reporte no funciona | Dentro de 3 dias |
| Baja | Mejora visual o funcional menor | Ajuste de colores o textos | Proxima actualizacion |

Los tiempos son una politica academica estimada, no un compromiso comercial real.

## 7. Procedimiento de mantenimiento

1. Registrar la incidencia.
2. Analizar el problema.
3. Identificar archivos afectados.
4. Realizar respaldo.
5. Aplicar la correccion.
6. Ejecutar pruebas.
7. Verificar que no se afecten otros modulos.
8. Documentar el cambio.
9. Liberar la actualizacion.

## 8. Plan de respaldo

- Respaldo semanal de la base de datos.
- Respaldo antes de cambios importantes.
- Copia del codigo fuente.
- Nombre sugerido: `mantenimiento_motos_2026-07-12.sql`.
- Lugar de almacenamiento: carpeta segura del equipo o unidad externa.
- Recuperacion basica: importar el archivo SQL en phpMyAdmin y restaurar el codigo desde la copia guardada.

## 9. Plan de pruebas

| Prueba | Resultado esperado | Estado |
| ------ | ------------------ | ------ |
| Inicio de sesion valido | Acceso al dashboard | Pendiente |
| Registro de cliente | Cliente almacenado | Pendiente |
| Placa duplicada | Mostrar mensaje de validacion | Pendiente |
| Eliminacion de cliente con motos | Bloqueo por dependencia | Pendiente |
| Registro de mantenimiento | Mantenimiento almacenado | Pendiente |

## 10. Responsables

El mantenimiento del sistema es una responsabilidad compartida de:

- Jhonier Josue Corozo Silva.
- Joseph Anthony Villegas Jaramillo.
- Marlon David Clemente Bernabe.
- Geanpool Stuard Estrella Sojos.
- Bryan Elver Zambrano Gonzalez.
- Luis Anthony Piguave Yagual.
- Isaac Alberto Hidalgo Maridueña

Distribucion sugerida:

- Analisis y correccion tecnica: Jhonier Josue Corozo Silva y Joseph Anthony Villegas Jaramillo.
- Base de datos y consultas: Marlon David Clemente Bernabe.
- Interfaz y vistas: Geanpool Stuard Estrella Sojos.
- Reportes y pruebas: Bryan Elver Zambrano Gonzalez.
- Documentacion y respaldo: Luis Anthony Piguave Yagual.

## 11. Cronograma de mantenimiento

| Frecuencia | Actividad |
| ---------- | --------- |
| Diaria | Verificar acceso al sistema y funcionamiento general. |
| Semanal | Revisar respaldos, formularios y reportes basicos. |
| Mensual | Revisar seguridad, consultas y archivos de configuracion. |
| Semestral | Actualizar documentacion, dependencias y compatibilidad. |
| Cuando exista una incidencia | Registrar, corregir, probar y documentar el cambio. |

## 12. Herramientas de mantenimiento

- Visual Studio Code.
- XAMPP.
- PHP.
- MySQL o MariaDB.
- phpMyAdmin.
- Navegador web.
- GitHub como repositorio del proyecto.
- Herramientas de desarrollo del navegador.

## 13. Riesgos

| Riesgo | Impacto | Medida de mitigacion |
| ------ | ------- | -------------------- |
| Perdida de informacion | Alto | Realizar respaldos periodicos y antes de cambios importantes. |
| Eliminacion accidental de registros | Alto | Confirmacion antes de eliminar y validacion de dependencias. |
| Cambios incompatibles | Alto | Probar en ambiente local antes de publicar. |
| Consultas inseguras | Alto | Usar sentencias preparadas. |
| Acceso no autorizado | Alto | Proteger rutas con sesion activa. |
| Fallos por actualizaciones | Medio | Revisar compatibilidad de PHP y MySQL. |
| Falta de documentacion | Medio | Mantener archivos de avance actualizados. |
| Dependencia de una sola persona | Medio | Compartir tareas entre los integrantes. |

## 14. Conclusion

El mantenimiento continuo permite que el sistema se mantenga estable, seguro y util para las actividades academicas. Documentar cambios, probar funciones y respaldar la base de datos reduce errores y mejora la calidad general del proyecto.
