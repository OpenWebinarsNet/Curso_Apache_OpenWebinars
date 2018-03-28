# Ejericios unidad: Módulo rewrite

Lo vamos a hacer en `apache2.openwebinars.net`

Necesitamos ejecutar php:

        apt install php7.0 libapache2-mod-php7.0


1. Habilitamos el módulo

		a2enmod rewrite

2. Creamos un fichero `.htaccess` en `/var/www/apache2`:

        Options FollowSymLinks
        RewriteEngine On
        RewriteBase /
        RewriteRule ^(.+).html$ $1.php [nc]

3. Como se puede acceder con las dos extennciones


        RewriteRule ^(.+).html$ $1.php [nc,r]

4. URL amigable

        Options FollowSymLinks
        RewriteEngine On
        RewriteBase /
        RewriteRule ^([a-z]+)/([0-9]+)/([0-9]+)$ operacion.php?op=$1&op1=$2&op2=$3

5. Accedemos a

        http://apache2.openwebinars.net/suma/8/6

6. Avvedemos a `http://apache2.openwebinars.net/index.php?lang=en`

7. Queremos cambiar la url, en el .htaccess:

        RewriteCond %{QUERY_STRING} lang=(.*)
        RewriteRule ^index.php$ /%1/$1

    Hay que borrar el fichero index.php anterior. Y crear un direcorio `es` y `en` con dos index traducidos.