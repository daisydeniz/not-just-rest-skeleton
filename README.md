# About Project
# not-just-rest-skeleton
Skeleton Rest With PHP 8.4 / Laravel 11

## Sail
vendor/bin/sail alias => sail
````sh
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
````
## Run Project

**1. Docker php image for composer install**
````sh
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php84-composer:latest \
laravelsail/php84-composer:latest \
composer install --ignore-platform-reqs
````
