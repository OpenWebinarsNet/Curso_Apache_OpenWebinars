# Ejercicios: PHP

1. Instalamos php y el módulo de apache2

		apt install apache2 php7.0 libapache2-mod-php7.0

2. Vemos que se desactiva event y se activa el prefork.

3. Vemos el fichero de configuración `/etc/apache2/mods-available/php7.0.conf`.

4. Creo un fichero info.php y compruebo que se está ejecutando el código.

5. configuración de php: estudiamos el directorio `/etc/php7.0`.

7. php-fpm. Instalamos el php7-0-fpm

		apt install php7.0-fpm php7.0

8. Puedo desactivar el módulo php para apache2 y activar event:

		# adismod mpm_prefork
		# a2dismod mpm_prefork
		# a2enmod mpm_event

9. Configuramos el vh con la configuración para que utilice fpm

		a2enmod proxy proxy_fcgi

		ProxyPassMatch ^/(.*\.php)$ unix:/run/php/php7.0-fpm.sock|fcgi://127.0.0.1/var/www/html/apache2

10. Cambio la configuración de php fpm para escuche por un puerto, 

		nano /etc/php/7.0/fpm/pool.d/www.conf 

		listen=127.0.0.1:9000

	Y cambio la configuración de apache2:

		ProxyPassMatch ^/(.*\.php)$ fcgi://127.0.0.1:9000/var/www/html/apache2/$1

	Y reincio los dos servicios

11. En la documentación podeís ver otra forma de hacer la configuración.

12. Quitamos la configuración del vh

13. Si queremos hacer esta configuración para todos los vh, activamos el fichero de configuración:

		a2enconf php7.0-fpm
	
	Y cambiamos la configuración:

		SetHandler "proxy:fcgi://127.0.0.1:9000"