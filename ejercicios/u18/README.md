# Ejericios unidad: Políticas de autentificación y de acceso

Lo vamos a hacer en nuestro servidor interno:

Tenemos un recurso que para acceder tenemos que autentificarnos, además a ese recurso sólo puedo acceder desde la red interna. Puede implementar dos políticas:

debemos tener un fichero de claves: `/etc/apache2/claves/passwd.txt`.

1. Se deben cumplir las dos 

		<Directory /var/www/servidor>
			AuthUserFile "/etc/apache2/claves/passwd.txt"
			AuthName "Introduce clave:"
			AuthType Basic
			<RequireAll>
				Require valid-user
				Require ip 172.22.0
			</RequireAll>
		</Directory>

2. Se debe cumplir alguno de los dos:

		<RequireAny>