# Ejercicios unidad: Control de acceso

Lo vamos a hacer en nuestro servidor local.

1. Permitimos acceso a `servidor.example.org\interna` desde la red interna.

		<Directory /var/www/servidor/interna>
			Order Allow,Deny
			Allow from 172.22.0
		</Directory>	

		<Directory /var/www/servidor/interna>
			Order Deny,Allow
			Deny from 192.168.56
		</Directory>	

		<Directory /var/www/servidor/interna>
			Require ip 172.22.0
		</Directory>	

		<Directory /var/www/servidor/interna>
			Require no ip 192.168.56
		</Directory>

2. Permitimos acceso a `servidor.example.org\externa` desde la red externa.

		<Directory /var/www/servidor/externa>
			Order Allow,Deny
			Allow from 192.168.56
		</Directory>	

		<Directory /var/www/servidor/externa>
			Require ip 192.168.56
		</Directory>

3. Tenemos un fichero `intranet.txt`, en `apache1.openwebinras.net`, le damos acceso sólo desde la intranet

		<FilesMatch "\.(txt)$">
			Order deny,allow
			Deny from 192.168.56
		</FilesMatch>	

		<FilesMatch "\.(txt)$">
			Order deny,allow
			Deny from all
			Allow from 172.22.0
		</FilesMatch>


		<FilesMatch "\.(txt)$">
			Deny from ip 192.168.56
		</FilesMatch>	

