# not-just-rest-skeleton
Skeleton Rest With PHP 8.4 / Laravel 11
## Install Project

*Clone repository*
````sh
  git clone https://github.com/daisydeniz/not-just-rest-skeleton.git
````
---
*Work in directory*
````sh
  cd not-just-rest-skeleton
````
---


*copy default env*
````sh
  cp .env.example .env
````
---

**Docker PHP 8.4 image for composer install**
````sh
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
````

*alias sale command for ease*
````sh
  alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
````
*up and run in backround*
````sh
  sail up -d
````
*Database fresh migration and seeding*
````sh
  sail artisan migrate:fresh --seed
````

*Login creds:*
```json
{
"email": "user@foo.bar",
"password": "password"
}
```
```json
{
"email": "admin@foo.bar",
"password": "password"
}
```
[Login](http://localhost/docs/api#/operations/auth.login)

---
> **Api Url :** [http://localhost/api](http://localhost/api)

> **Api Docs Url :** [http://localhost/docs/api](http://localhost/docs/api)

> **Telescope :** http://localhost/telescope/



**Generate ide-helper files:**
````sh
    sail composer run ide-helper
````

## Tools

[barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)

[dedoc/scramble](https://github.com/dedoc/scramble)

[laravel/telescope](https://github.com/laravel/telescope)

[laravel/pint](https://github.com/laravel/pint)

[fzaninotto/faker](https://github.com/fzaninotto/faker)
