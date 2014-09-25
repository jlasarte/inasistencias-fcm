Inasistencias FCM
==================

1) Instalar Composer
----------------------------------

    curl -s http://getcomposer.org/installer | php

Eso les baja el arcvhio composer.phar al cwd. Si quieren lo agregan al path y lo usan como "php composer"
o lo dejan por ahí tirado (como hice yo) y lo usan, por ej:

    php ~/composer.phar update

2) Instalar las bundles
-------------------------------------

    php ~/composer.phar install

Esto instala:

- Todas las bundles requeridas por el proyecto
- Todos los assets (css, js) requeridas por las bundles
- Limpia la cache

Tambien les va a avisar que no existe el parameters.yml y se los va a crear. Ahí les va pidiendo los datos de la base/mail etc.

### Locale

Ojo! si quieren usar locale: es tienen que instalar [php-intl](http://php.net/manual/en/intl.setup.php) en su
máquina.

3) Instalar db
--------------

    php app/console doctrine:schema:update --force

4) Crear admin
--------------

    php app/console fos:user:create adminuser --super-admin

5) Profit (?)
-------------
