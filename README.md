#  spa-symfony-vue-container
Este proyecto hace uso de docker para desplegar los siguientes contenedores:

|  Container | Specific Stuff | Use |
| :---------:| :--: |:--: |
| container-backend-app | Php 7.4, Node.js v14, Nginx | Despliegue de ApiRest con Symfony5.3 & ApiPlatform y SPA con Vue3  |
| container-backend-mysql | Mysql 5.7 | base de datos |

 
## Instalación 🔧
* Es necesario tener instalado [Docker](https://docs.docker.com/engine/install/) y [Composer](https://docs.docker.com/compose/install/)  en tu equipo así como una  conexión a Internet
* Ubicarse en {PROJECT-PATH}/docker  y ejecutar `docker-compose build`.
* Puede obviar el uso del contenedor y exponer la api y ui en cualquier otro entorno.

### back(api)
* Ubicarse en {PROJECT-PATH}/src/api dentro de contenedor container-backend-app
* Ejecutar `composer install` para instalar dependencias
* Ejecutar `copy .env.example .env`  el archivo example contiene credenciales preconfiguradas para acceso al servicio brindado por docker.
* Ejecutar  `php bin/console doctrine:schema:update --force` para construir esquema de bd
* Ejecutar  `bin/console doctrine:migrations:migrate`
* Ejecutar  `php bin/console doctrine:fixtures:load` para poblar la bd
* Puede acceder a ui de Api Platform http://localhost:8085

### front(ui)
* Ubicarse en {PROJECT-PATH}/src/ui
* Ejecutar `npm install` para instalar dependencias
* Ejecutar `copy .env.example .env` el archivo example contiene rutas preconfiguradas para acceso al servicio brindado por docker.
* Ejecutar `npm run serve` 
* Acceda a la aplicacion a traves de http://localhost:8080


### Despliegue en otro entorno
* Puede desplegar la app en cualquier entorno alojando y  xponiendo unicamente el contenido de {PROJECT-PATH}/src
* Para desplegar es necesario, ademas de los comandos anterior para cada servicio modificar los archivos .env y editar credenciales y rutas
* Adicional es necesario editar el proxy alojado en el archivo {PROJECT-PATH}/src/ui/vue.config.js segun las rutas en las que se expone el backend


## Author
* Name: **Paulo Horna**
* Email: **paulo.ahll@gmail.com**


