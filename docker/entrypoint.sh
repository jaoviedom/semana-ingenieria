#!/bin/sh
set -e

# Asegurar directorios de almacenamiento y caché de Laravel
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/bootstrap/cache

# Ajustar permisos necesarios
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Eliminar sitios default conflictivos de Nginx
rm -f /etc/nginx/sites-enabled/default || true

# Configurar el puerto dinámico de Render ($PORT) o puerto 80 por defecto
PORT_HTTP="${PORT:-80}"
echo "==> Configurando Nginx en el puerto HTTP ${PORT_HTTP}..."
sed -i "s/listen [0-9]*;/listen ${PORT_HTTP};/g" /etc/nginx/conf.d/default.conf

# Ejecutar migraciones si se especifica la variable de entorno
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "==> Ejecutando migraciones de base de datos..."
    php artisan migrate --force || true
fi

# Iniciar PHP-FPM en segundo plano
echo "==> Iniciando PHP-FPM..."
php-fpm -D

# Iniciar Nginx en primer plano
echo "==> Iniciando Nginx..."
exec nginx -g "daemon off;"
