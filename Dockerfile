FROM php:8.2-fpm

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony
    
#RUN composer require symfony/serializer

#RUN composer install --no-dev --optimize-autoloader

# Указываем рабочую директорию
WORKDIR /var/www/html

CMD ["php-fpm"]

