# Proyecto Backend Criptomonedas

## Instrucciones de instalación

1. Clona el repositorio:
   ```bash
    https://github.com/Madriz31/backend-criptomonedas.git
   cd backend-criptomonedas.git

2. Instala las dependencias PHP con Composer:
    composer install

3. Copia el archivo de configuración:
    cp .env.example .env

4. el archivo .env debe quedar asi 

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/l8Z+KDu+r+mMiSzcSAq3p+9Bn7skcDSHo06XUshxL0=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
DB_DATABASE=database/database.sqlite
# DB_USERNAME=root
# DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

JWT_SECRET=YVEjUoGrRSdUeM0ucXHxr9LmpsLxEWX2im9VtXT6EF8asRwjFZ09Y7HYH1rz5r6l
 

5. genera la caalve de la app
    php artisan key:generate

6.Ejecuta las migraciones para crear las tablas

    php artisan migrate

7. Antes de correr el proyecto, asegúrate de que en tu archivo php.ini estén activas estas extensiones (descomentadas):
    ; Habilitar SQLite
    extension=pdo_sqlite
    extension=sqlite3

    ; Habilitar OpenSSL (necesario para JWT)
    extension=openssl

y ejecuta el servidor local 
php artisan serve
 

## Colección Postman para pruebas

He incluido en el repositorio una colección Postman con todas las pruebas del API.

### Cómo usarla:

1. Abre Postman.
2. Importa el archivo `postman/criptomonedas_api_collection.json`.
3. Crea un entorno (Environment) en Postman con variables para:
   - `base_url` = `http://localhost:8000/api`
   - `jwt_token` = *Tu token JWT obtenido tras login*

4. En la colección, las peticiones ya usan esas variables en los headers, así que solo asegúrate de tenerlas configuradas.
5. Ejecuta las peticiones en el orden lógico: registrar usuario, login, crear moneda, crear cripto, listar, etc.

---

**Nota:** Todas las peticiones protegidas requieren el header:

