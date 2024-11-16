#!/bin/bash


if ! command -v php >/dev/null 2>&1; then
    sudo apt install php;
fi

xdg-open http://localhost:8080;
php -S localhost:8080;

