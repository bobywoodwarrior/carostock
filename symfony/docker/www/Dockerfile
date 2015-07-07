# Pull base image.
FROM debian:wheezy

# As we need a decent version of PHP, we first have to enable the DotDeb repository
RUN echo "\n\
# DotDeb repository: \n \
deb http://packages.dotdeb.org wheezy all \n\
deb-src http://packages.dotdeb.org wheezy all \n\
deb http://packages.dotdeb.org wheezy-php55 all \n\
deb-src http://packages.dotdeb.org wheezy-php55 all \n\
" >> /etc/apt/sources.list
RUN apt-get update && apt-get install -y curl wget && curl -O http://www.dotdeb.org/dotdeb.gpg && apt-key add dotdeb.gpg

# Apache + PHP install
RUN apt-get update && apt-get install -y \
        apache2 \
        php5 \
        libapache2-mod-php5 \
        php5-cli \
        php5-mysql \
        php5-curl \
        php5-redis \
        php5-imagick \
        php5-mcrypt \
        php5-intl \
        php5-dev \
        php5-sqlite \
        php5-xdebug

# Apache modules
RUN a2enmod \
        php5 \
        rewrite \
        headers \
        expires

# Apache service is stopped (we will start it with a foreground process)
RUN service apache2 stop

# Composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv /composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Node.js
# We shouldn't install Node.js on this "PHP+Apache" machine, but as our "composer install" post-install hook triggers Node.js, we *do* need it.
# @see https://github.com/joyent/docker-node/blob/master/0.10/Dockerfile
RUN gpg --keyserver pool.sks-keyservers.net --recv-keys 7937DFD2AB06298B2293C3187D33FF9D0246406D 114F43EE0176B71C7BC219DD50A3051F888C628D
ENV NODE_VERSION 0.10.38
ENV NPM_VERSION 2.7.3
RUN curl -SLO "http://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz" \
    && curl -SLO "http://nodejs.org/dist/v$NODE_VERSION/SHASUMS256.txt.asc" \
    && gpg --verify SHASUMS256.txt.asc \
    && grep " node-v$NODE_VERSION-linux-x64.tar.gz\$" SHASUMS256.txt.asc | sha256sum -c - \
    && tar -xzf "node-v$NODE_VERSION-linux-x64.tar.gz" -C /usr/local --strip-components=1 \
    && rm "node-v$NODE_VERSION-linux-x64.tar.gz" SHASUMS256.txt.asc \
    && npm install -g npm@"$NPM_VERSION" \
    && npm cache clear

# Shared files
COPY container-build-resources/xdebug.ini /etc/php5/mods-available/xdebug.ini

COPY container-build-resources/container-entry-point /usr/local/bin/
RUN chmod +x /usr/local/bin/container-entry-point
COPY container-build-resources/container-start-apache-in-background /usr/local/bin/
RUN chmod +x /usr/local/bin/container-start-apache-in-background

# Define mountable directories.
VOLUME ["/etc/apache2/sites-enabled", "/var/log/apache2", "/var/www/"]

# Start!
WORKDIR /var/www/

EXPOSE 80
CMD ["container-entry-point"]
