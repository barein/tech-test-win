FROM bitnami/php-fpm:8.2.1

#Install SURY repo to install php8.2 extensions
RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && apt install -y nano \
    && apt install -y curl wget gnupg2 ca-certificates lsb-release apt-transport-https \
    && wget https://packages.sury.org/php/apt.gpg \
    && apt-key add apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php8.list \
    && apt update \
##Install php8.2 extensions
    && apt install -y php8.2-ctype php8.2-iconv php8.2-simplexml php8.2-tokenizer php8.2-mysql php8.2-curl php8.2-mbstring php8.2-intl php8.2-bcmath php8.2-zip \
##Disable opcache
    && sed -rie 's/^opcache.enable = 1$/opcache.enable = 0/' /opt/bitnami/php/lib/php.ini

#Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

RUN PATH=$PATH:/apps/vendor/bin:bin
