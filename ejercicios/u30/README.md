# Ejercicios: mod_security

Hay que instalar mysql

	apt install mysql php7.0-mysql

	mysql_secure_installation
	create database sample;
	use sample;
	create table users(username VARCHAR(100),password VARCHAR(100));
	insert into users values('pepe','password');
	CREATE USER 'user'@'localhost';
	GRANT ALL PRIVILEGES ON sample.* To 'user'@'localhost' IDENTIFIED BY 'password';
	flush privileges;

Activamos mod_security

	apt-get install libapache2-mod-security2

Por defecto el módulo trae una configuración recomendado, para activarla le cambiamos el nombre:

	# cd /etc/modsecurity
	# mv modsecurity.conf-recommended modsecurity.conf

Fichero auditorias: `/var/log/apache2/modsec_audit.log`.

En `/etc/modsecurity/modsecurity.conf`, podemos encontrar:
	
	SecRuleEngine DetectionOnly

Podemos modificar otras directivas:

* `SecResponseBodyAccess`: Podemos desactivarla para evitar que se guarde el cuerpo de la respuesta.
* `SecRequestBodyLimit`: Podemos especificar el tamaño máximo de los datos POST.
* `SecRequestBodyNoFilesLimit`: De forma similar podemos indicar el tamaño de los datos POST menos el tamaño de los ficheros de subida. Este valor debe ser lo más pequeño posible (128K) (se supone que si no tenemos en cuenta los ficheros subidos los datos que se mandan por POST no deben ser muy grandes).
* `SecRequestBodyInMemoryLimit`: Indica el tamaño de RAM que se utiliza para cachear la petición. Variar este parámetro puede tener consecuencia en el rendimiento del servidor.



Activando las reglas de detección

Por defecto tenemos un conjunto de reglas activadas, que llamamos CRS (*Core Rules Set*). Si nos fijamos en el fichero de configuración del módulo `/etc/apache2/mods-available/security2.conf`, ademas de indicar el directorio donde se va a guardar información (directiva `SecDataDir`), incluye el fichero donde están definida las CRS:

	IncludeOptional /usr/share/modsecurity-crs/owasp-crs.load

Las reglas se encuentran en el directorio `/usr/share/modsecurity-crs/rules`.

La que nos interesa `REQUEST-942-APPLICATION-ATTACK-SQLI.conf`

realizamos el ataque y miramos el archivo de audotoria: `/var/log/apache2/modsec_audit.log`.

Activamos el módulo:
	
	SecRuleEngine On


