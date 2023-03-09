ARG VARIANT=8.0

FROM php:${VARIANT}-cli

ARG USERNAME=vscode

ARG USER_UID=1000

ARG USER_GID=$USER_UID

ARG INSTALL_ZSH=true

ARG UPGRADE_PACKAGES=true

COPY debian.sh /tmp/library-scripts/

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && bash /tmp/library-scripts/debian.sh "${INSTALL_ZSH}" "${USERNAME}" "${USER_UID}" "${USER_GID}" "${UPGRADE_PACKAGES}" \
    && usermod -aG www-data ${USERNAME} \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/* /tmp/library-scripts

RUN curl -sSL https://getcomposer.org/installer | php \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# RUN docker-php-ext-install sockets

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y \
    libonig-dev \
    librdkafka-dev && \
    pecl install rdkafka && \
    docker-php-ext-enable rdkafka

RUN pecl install swoole \
    && docker-php-ext-enable swoole

USER ${USERNAME}

RUN composer global require squizlabs/php_codesniffer phpcompatibility/php-compatibility && \
    /home/${USERNAME}/.composer/vendor/bin/phpcs --config-set installed_paths /home/${USERNAME}/.composer/vendor/phpcompatibility/php-compatibility
