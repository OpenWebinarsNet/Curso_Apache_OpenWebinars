# Ejericios unidad: Autentificación digest

Lo vamos a hacer en `apache2.openwebinars.net`:

1. Configuración:

		<Directory /var/www/apache2/privado>
			AuthUserFile "/etc/apache2/claves/digest.txt"
			AuthName "dominio"
			AuthType Digest
			Require valid-user
		</Directory>

2. Creamos los usuarios

		htdigest -c /etc/apache2/claves/digest.txt dominio carolina