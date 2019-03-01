FROM php:apache
LABEL maintainer="Morten Holm Christensen <mhc@mortenhc.dk>"

RUN a2enmod headers
RUN a2enmod rewrite