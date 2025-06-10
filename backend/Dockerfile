# PHP 8.2 + Apache イメージを使用
FROM php:8.2-apache

# システム依存関係とPHP拡張をインストール
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Apacheの設定：Laravelのpublicディレクトリをドキュメントルートに変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    && a2enmod rewrite

# Composerインストール（公式イメージからコピー）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# プロジェクトファイルをコピー
COPY . /var/www/html

# 作業ディレクトリ
WORKDIR /var/www/html

# Laravel依存関係インストール（本番用）
RUN composer install --no-dev --optimize-autoloader

# パーミッション設定
RUN chown -R www-data:www-data storage bootstrap/cache

# ポート開放
EXPOSE 80

# Apache起動
CMD ["apache2-foreground"]
