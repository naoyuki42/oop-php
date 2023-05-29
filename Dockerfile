FROM php:cli

RUN apt-get update
RUN apt-get -y install git zip unzip vim

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer