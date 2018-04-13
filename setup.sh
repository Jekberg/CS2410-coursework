#!/usr/bin/env bash

php composer.phar install;
php artisan key:generate;
php artisan storage:link;
php artisan migrate;
npm install;
npm run prod;
