FROM php:8.4-cli-alpine
WORKDIR /app
COPY --from=ghcr.io/mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions @composer \
    && apk add --no-cache make