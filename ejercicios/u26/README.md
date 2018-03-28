# Ejercicios: Python

Vamos a hacerlo en el apache.openwebinars en otro vh: apache3

Vamos a instalar django en el servidor

		apt install python3-django

		cd /var/www/apache3/
		django-admin startproject mysite


		nano myste/mysite/settings.py
		ALLOWED_HOSTS = ["*"]

		 python3 manage.py runserver  0.0.0.0:8000


1. Activamos el módulo

		apt install libapache2-mod-wsgi-py3

2. Creamos un nuevo vh con la siguiente configuración:

	    ServerName apache3.openwebinars.net
        ServerAdmin webmaster@localhost
        DocumentRoot /var/www/apache3/mysite
        WSGIDaemonProcess mysite user=www-data group=www-data processes=1 threads=5 python-path=/var/www/apache3/mysite
        WSGIScriptAlias / /var/www/apache3/mysite/mysite/wsgi.py

	    <Directory /var/www/apache3/mysite>
            WSGIProcessGroup mysite
            WSGIApplicationGroup %{GLOBAL}
            Require all granted
    	</Directory>

## uwsgi

		apt install uwsgi
		apt install uwsgi-plugin-python3

	Creamos una configuración uwsgi (uwsgi.ini)

		[uwsgi]
		http-socket = :8080
		chdir = /var/www/apache3/mysite
		wsgi-file = /var/www/apache3/mysite/mysite/wsgi.py
		processes = 4
		threads = 2
		plugin = python3

	Y configuramos el virtual host:

		a2enmod proxy proxy_http


	    DocumentRoot /var/www/apache3/mysite
        ServerAdmin webmaster@localhost
		ProxyPass / http://localhost:8080/

    Y ejecutamos:

    	uwsgi uwsgi.ini

Si cambiamos a uwsgi:

	En `uwsgi.ini`:

		socket=:8080

	Activamos el submodulo de proxy:

		apt install libapache2-mod-proxy-uwsgi

	Y cambiamos la configuración 

		ProxyPass / uwsgi://127.0.0.1:8080/



