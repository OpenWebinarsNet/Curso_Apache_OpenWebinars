# Ejemplo unidad: Paginas de error personalizada

1. Una página de error 404

		ErrorDocument 404 /error/index.html

2. Lo quitamos
3. Activamos módulo include

		a2enmod include

4. Descomentamos el fichero `/etc/apache2/conf-available/localized-error-pages.conf`