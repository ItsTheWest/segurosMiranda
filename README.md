# Mi Proyecto - Seguros Miranda

En este archivo explico los pasos que hice para que el proyecto funcionara y cómo arreglé los errores que me fueron saliendo en el camino, para dar sulcion a la problematica planteada

## Pasos que realicé

### Instalación de dependencias
Lo primero que hice fue intentar cargar el proyecto, pero me faltaba la carpeta `vendor`. Para solucionarlo ejecuté:
* `composer install`
* Como tuve algunos problemas de compatibilidad con mi versión de PHP, usé: `composer install --ignore-platform-reqs`

### Configuración del archivo .env y la Key
Me apareció el error de que no había una llave de cifrado (encryption key). Los pasos que seguí fueron:
1. Copié el archivo `.env.example` y lo renombré como `.env`. Me di cuenta que fue un error el eliminar la extension del archivo .env.exemple
2. Luego ejecuté el comando: `php artisan key:generate` para que la aplicación tuviera su propia llave de seguridad.

### Testeo de procesos
Realice el llenado del formulario en la vista para saber si todos los proceso se estaban ejecutando como s ehabia dejado en la prueba


### Corrección de Base de Datos
Una vez teniendo eso, borré la tabla de personas y la fila de la tabla de migración importada, posteriormente la volví a migrar ya que había elementos cuyos tipos no eran los correctos.

### Visualización de datos y Controlador
Realicé la parte de la tabla para ver la lista de personas con un diseño de Bootstrap ya definido. Posteriormente, realicé una función en el controlador de personas para obtener los datos de todos los registros que estaban en la tabla de personas; en la web realicé una petición para traer esos datos mediante el controlador y mostrarlos. para mostrar dichos datos en la vista realice una iteracion de los dtos que ya existian en la tabla, consulte como podria tomar el valor del año de la fecha(mediante la funcion carbon parse ya integrada), pude realizar una resta simple mediante una comparacion del dato del año que pase, con el age que toma el año del sistema 