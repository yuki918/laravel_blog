FROM php:8.1-fpm
# php.ini（ローカル）をホスト【コンテナ】（/usr/local/etc/php/）にコピーする
COPY php.ini /usr/local/etc/php/

# gitやvimなどのパッケージ（コマンド）のインストール
# 必要なパッケージを記入する
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfontconfig1 \
    libxrender1

# PHP Extensionsのインストール
RUN apt install -y zlib1g-dev mariadb-client libzip-dev libonig-dev \
    && docker-php-ext-install zip pdo_mysql

# Composerのインストール & パス通す
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# nodeインストール
RUN apt install -y npm \
    && npm install n -g \
    && n stable

# RUN , CMD , ENTRYPOINT , COPY , ADD を実行する時のワーキングディレクトリを指定
WORKDIR /src

ADD . /src/laravel/storage
RUN chown -R www-data:www-data /src/laravel/storage