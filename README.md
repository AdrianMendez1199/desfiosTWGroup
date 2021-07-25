# Desafios

En este repositorio se encuentran todo los desafios twgroup tanto codigo como teorico.

### Desafio #2
Para instalar laravel requieres de dos componentes, php y composer.

Instalación de php
```sh
## linux 
apt-get install php (ubuntu/debian) ### el comando apt-get permite install
yum install php (centos) ### lo mismo el comando yum

### macOS
brew install php

### windows 
### instalar xampp, wampp, laragon etc.
```

Instalar composer (Manejador de paquetes php)
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" 
## -> utiliza php para descargar composer

php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
## -> verifica que la descarga  que hicimos sea correcta, comporando un hash y si no lo es borrar el achivo que se descargo.

php composer-setup.php ## instala el composer en nuestra computadora, generara un archivo nuevo

mv composer.phar /usr/local/bin/composer ### moviendo el archivo

php -r "unlink('composer-setup.php');" ### removiendo el instalador
```

Creación de un proyecto laravel
```sh
 composer create-project --prefer-dist laravel/laravel project-name ## nos generar el proyecto laravel, con su configuración basica.
 
cd  project-name ## accedemos al proyecto

php artisan serve ## este comando levantara la aplicación de laravel, por lo generar se encuentra en el puerto 8000 si esta ocupado cambiara al 8001.
```


# Desafio 5

**¿Qué es "Laravel Jetstream"?**

Es un stack de laravel que está prediseñado con ciertas tareas que son ciertamente repetitivas en algunos proyectos, por eje: (Autenticación, registro, cambio de contraseña, confirmación de contraseña, two factor autenticación. etc) estas tareas que muchas veces son repetitivas, pero muy importantes para el sistema y que llevan mucho tiempo de desarrollo, son las que Jetstream ya tiene prediseñadas.

**¿Qué permite "Livewire" a los programadores?**

Livewire es una libreria creada para la creación de interfaces dinamicas
sin olvidarse de blade. Lo que permite a los desarrolladores es crear interfaces dinamicas utilizado php, sin necesidad de utilizar librerias como react o vuejs 
