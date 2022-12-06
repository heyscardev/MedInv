## INFO VERSION
    node v16.15.1
    composer v2.3.7
    npm v8.11.0
    php 8.1
## Info app
MedInv
es una aplicacion de control de inventario de medicamentos
con factura recipe y implementacion de diferentes roles

## INSTALL DEVELOP
    CLONAR GIT
    
    IR A RAIZ 
    EJECUTAR COMPOSER INSTALL
    NPM INSTALL

    CREAR .env EN LA RAIZ 
    DAR CREDENCIALES DE BASES DE DATOS A ENV
    CREAR Base de datos  EN SQL
    EJECUTAR para primera vez
        php artisan migrate  //para migrar la bd *si no esta migrada*
        php artisan db:seed
    
    Ejecucion del sistema en (consolas separadas)
        npm run dev
        php artisan serve


## INSTALL PRODUCTION

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Info Autores
Esta aplicacion fue desarrollada por 
Heyscar Romero
y siempre se debe retribuir el merito de este

esta es una aplicaciondonde solo se permite el uso gratuito al IVSS
si quiere ser usada para uso comercial debe comunicarse con el autor de esta

