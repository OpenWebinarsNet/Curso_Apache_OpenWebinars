# Ejericios unidad: .htaccess

Lo vamos a hacer en nuestro servidor interno:

Creamos un fichero `.htaccess`

0. Hay que cambiar el `AllowOverride` de `/etc/apache2/apache2.conf`

1. Deshabilitar la opción de listar los ficheros en ese directorio.

		Options -Indexes

2. Protege tu directorio y ficheros con autentificación básica.

		AuthUserFile "/etc/apache2/claves/passwd.txt"
		AuthName "Introduce clave:"
		AuthType Basic	
		Require valid-user

3. Hacer que los ficheros txt no sean accesibles.

		<FilesMatch "\.(txt)$">
			Deny from all
		</FilesMatch>	

4. Crear una lista de IPs prohibidas
 
		<RequireAll>
			Require valid-user
			Require no ip 192.168.56
		</RequireAll>
