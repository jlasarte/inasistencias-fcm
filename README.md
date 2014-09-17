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
    php app/console assets:install web

3) Limpiar la cache
-------------------

    php app/console cache:clear

4) Parameters
-----------------

Copiar app/config/parameters.yml.dist con el nombre app/config/parameters.yml (Si le cambian el nombre queda modificado
en el repositorio para todos), y completenlo con sus parametros.

### Locale

Ojo! si quieren usar locale: es tienen que instalar [php-intl](http://php.net/manual/en/intl.setup.php) en su
máquina. 

5) Instalar db
--------------

    php app/console doctrine:schema:update --force

6) Profit (?)
------------
