# Ejericios unidad: Autentificación básica

Lo vamos a hacer en `apache2.openwebinars.net`:

1. Configuración:

		<Directory /var/www/apache2/privado>
			AuthUserFile "/etc/apache2/claves/passwd.txt"
			AuthName "Palabra de paso"
			AuthType Basic
			Require valid-user
		</Directory>

2. Creamos los usuarios

		htpasswd -c /etc/apache2/claves/passwd.txt carolina

