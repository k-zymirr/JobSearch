#!/bin/bash

if ! command -v php >/dev/null 2>&1; then
    sudo pacman -S php;
    sudo pacman -S php-sqlite;
fi

xdg-open http://localhost:8080;
php -S localhost:8080;
