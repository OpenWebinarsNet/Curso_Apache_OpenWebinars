# Ejericios unidad: Módulo WEBDAV

Lo vamos a hacer en `apache2.openwebinars.net`


1. Habilitamos el módulo

		a2enmod dav dav_fs

2. Vemos el fichero de configuración

		DavLockDB /tmp/DavLock
    	<Directory /var/www/apache2/webdav>
            dav on
            Options Indexes FollowSymLinks MultiViews
            AllowOverride None
            AuthType digest
            AuthUserFile "/etc/apache2/claves/digest.txt"
            AuthName "dominio"
            Require valid-user
    	</Directory>

3. Importante

		chown -R www-data:www-data webdav/

4. Conectamos a:

		dav://usuario@apache2.openwebinars.net/webdav

		