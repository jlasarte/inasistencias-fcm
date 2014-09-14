Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

This document contains information on how to download, install, and start
using Symfony. For a more detailed explanation, see the [Installation][1]
chapter of the Symfony Documentation.

1) Installing the Standard Edition
----------------------------------

When it comes to installing the Symfony Standard Edition, you have the
following options.

### Use Composer (*recommended*)

As Symfony uses [Composer][2] to manage its dependencies, the recommended way
to create a new project is to use it.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

Then, use the `create-project` command to generate a new Symfony application:

    php composer.phar create-project symfony/framework-standard-edition path/to/install

Composer will install Symfony and all its dependencies under the
`path/to/install` directory.

### Download an Archive File

To quickly test Symfony, you can also download an [archive][3] of the Standard
Edition and unpack it somewhere under your web server root directory.

If you downloaded an archive "without vendors", you also need to install all
the necessary dependencies. Download composer (see above) and run the
following command:

    php composer.phar install

2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

The script returns a status code of `0` if all mandatory requirements are met,
`1` otherwise.

Access the `config.php` script from a browser:

    http://localhost/path/to/symfony/app/web/config.php

If you get any warnings or recommendations, fix them before moving on.

3) Browsing the Demo Application
--------------------------------

Congratulations! You're now ready to use Symfony.

From the `config.php` page, click the "Bypass configuration and go to the
Welcome page" link to load up your first Symfony page.

You can also use a web-based configurator by clicking on the "Configure your
Symfony Application online" link of the `config.php` page.

To see a real-live Symfony page in action, access the following page:

    web/app_dev.php/demo/hello/Fabien


Instalar Aplicación
===================

Después de clonar el repositorio

1) Crear Base de Datos y Usuario
--------------------------------

La aplicación está configurada para usar una db de nombre medinasist, usuario medinasist y password también.

2) Eliminar Cache
-----------------

Eliminen todos los archivos en /app/cache/ para que no los bardee

3) Habilitar mod_rewrite
------------------------

4) Configurar directorio virtual para la app
--------------------------------------------

En ubuntu 14 es /etc/apache2/sites-available/000-default.conf y uso:

    <Directory "/var/www/html/inasistencias-fcm/web">
            AllowOverride All
            Order deny,allow
            Allow from 127.0.0.1
            Require all granted
    </Directory>

Pero mientras esté el AllowOverrideAll funciona bien

5) Importar db

creo que haciendo

    php app/console doctrine:schema:update --force

crea las tablas para fos_user, sino está el medinasist.sql en el directorio raiz.
