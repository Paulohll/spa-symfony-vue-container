##################################################################################
#            Lumen 5.8 Application - civitatis-backend-app - Dockerfile v0.1          #
##################################################################################

#------------- Setup Environment -------------------------------------------------------------

# Pull base image
FROM ubuntu:18.04

ARG UNAME=cvrt
ARG UID=1000
ARG GID=1000


# Install common tools
RUN apt-get update
RUN apt-get install -y wget curl nano htop git unzip bzip2 software-properties-common locales sudo vim

# Set evn var to enable xterm terminal
ENV TERM=xterm

# Set timezone to UTC to avoid tzdata interactive mode during build
ENV TZ=Etc/UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


# Add host user and group
RUN groupadd -g ${GID} -o ${UNAME}
RUN useradd -l -m -u ${UID} -g ${GID} -s /bin/bash ${UNAME}
RUN adduser ${UNAME} sudo


# Set working directory
WORKDIR /var/www/html

# Set up locales 
# RUN locale-gen 

#------------- Sql Client  ----------------------------------------------------
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17


#------------- Application Specific Stuff ----------------------------------------------------

# Install PHP
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
RUN apt update
RUN apt-get install -y \
    php7.4-fpm \ 
    php7.4-common \ 
    php7.4-curl \ 
    php7.4-mysql \ 
    php7.4-mbstring \ 
    php7.4-json \
    php7.4-xml \
    php7.4-bcmath

# Install driver PHP SQL
RUN   apt install php-pear -y
RUN   apt-get install php7.4-dev -y
RUN   apt install unixodbc-dev -y
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv
RUN  printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/7.4/mods-available/sqlsrv.ini 
RUN  printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/7.4/mods-available/pdo_sqlsrv.ini 

RUN phpenmod v 7.4 sqlsrv pdo_sqlsrv



# Install NPM and Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs 

#------------- FPM & Nginx configuration ----------------------------------------------------

# Config fpm to use TCP instead of unix socket
ADD resources/www.conf /etc/php/7.4/fpm/pool.d/www.conf
RUN mkdir -p /var/run/php

# Install Nginx
RUN add-apt-repository ppa:nginx/stable
RUN apt-get update
RUN apt-get install -y nginx
RUN useradd nginx
RUN apt-get install -y nginx-extras

# ADD resources/default /etc/nginx/sites-enabled/
ADD resources/nginx.conf /etc/nginx/

#------------- Composer & app configuration ----------------------------------------------------

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#------------- Supervisor Process Manager ----------------------------------------------------

# Install supervisor
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
ADD resources/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

#------------- Container Config ---------------------------------------------------------------
# Expose port 80
EXPOSE 80
EXPOSE 8080

# Set entry..
ADD resources/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod 774 /usr/local/bin/docker-entrypoint.sh \
    && ln -s /usr/local/bin/docker-entrypoint.sh /
ENTRYPOINT [ "/docker-entrypoint.sh" ]
