# Ejemplos unidad 10: Opciones de directorios

Lo realizamos sobre apache1.openwebinars.net:

1. Borramos el fichero index.html

		mv index.html index.txt

2. Creamos varios ficheros `*.txt`

		touch fichero1.txr
		...
3. accedemos y vemos el índice de directorios
4. Quitamos la opción de índice
		
		<Directory /var/www/apache1>
    		Options -Indexes
5. Y volvemos a comprobar

6. Creamos un enlace símbolico

		ln -s /etc/hosts hosts

7. Quitamos la opción en `/etc/apache2/apache2.conf` de seguir enlaces símbolicos y vemos como ha desaparecido.

8. Ponemos la opción `SymLinksIfOwnerMatch` y vuelve a funcionar (los propietarios son root)

9. Cambiamos los propietarios del enlace símbolico

		/var/www/apache1# chown www-data:www-data *

10. y ya no funciona

