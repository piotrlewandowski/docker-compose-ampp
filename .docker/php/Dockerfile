FROM php:7.3-fpm-alpine
MAINTAINER Piotr Lewandowski <contact@piotrlewandowski.info>

RUN apk update; \
    apk upgrade;


# Add Necessary PHP Extensions
# https://github.com/docker-library/php/issues/279
RUN docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo pdo_mysql \
    && docker-php-ext-install mysqli;

# For easy navigating add oh my zsh and it's deps
RUN apk -q add curl \
    zsh \
    nano \
    git; \
    sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"; \
    sed -i s^ZSH_THEME=\"robbyrussell\"^ZSH_THEME=\"blinks\"^g ~/.zshrc;

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"; \
    php composer-setup.php; \
    php -r "unlink('composer-setup.php');"; \
    echo 'alias composer="php /var/www/public/composer.phar" > ~/.zshrc';

# Install XDebug
RUN apk --no-cache add $PHPIZE_DEPS \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug;
#RUN docker-php-ext-enable xdebug;
