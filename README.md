# Upload Images App

Esta es una aplicación Laravel para subir y gestionar imágenes y archivos de forma interactiva.

## Características

- Subir imágenes
- Ver lista de imágenes subidas
- Ver detalles de una imagen específica

## Requisitos

- PHP 
- Composer
- Laravel

## Instalación

1. Clona el repositorio:
    ```sh
    git clone https://github.com/Jferrui0803/subirImagen.git
    cd subirImagen
    ```

2. Instala las dependencias de PHP:
    ```sh
    composer install
    ```


3. Configura el archivo `.env`:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Ejecuta las migraciones:
    ```sh
    php artisan migrate
    ```

## Uso

1. Vista de la tabla

![Lista de Imágenes](/img/1.PNG)


### Subir una imágen

2. Insertar una imagen

![Subir Imagen](/img/2.PNG)

### Ver detale de una imágen

3.1 Clickeando view

![Detalle imagen](/img/3.PNG)

3.2 Clickeando directamente la imagen

![Detalle imagen](/img/4.PNG)

### Editar una imagen

![Detalle imagen](/img/5.PNG)

### Eliminar una imagen

![Detalle imagen](/img/6.PNG)

## Licencia

Este proyecto está licenciado bajo la [MIT License](LICENSE).
