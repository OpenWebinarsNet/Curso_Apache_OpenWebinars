# Ejemplos unidad 11: Alias

1. Tenemos en el home una carpeta `directorio` con una imagen `tux.png`.

2. Creamos en apache1 un alias:

		Alias /web /home/debian/directorio

		<Directory "/home/debian/directorio">
			Require all granted
		</Directory>

3. Accedemos a `http://apache1.openwebinars.net/web/tux.png`.

4. Cramos un index.html en home

5. Accdemos a `http://apache1.openwebinars.net/web/`.

