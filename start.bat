@echo off
title BEYOND - Serwer Lokalny
echo ================================================
echo   Startowanie serwera dla projektu BEYOND...
echo   Adres: http://localhost:8000
echo   Aby zamknac serwer: wcisnij Ctrl + C
echo ================================================
start http://localhost:8000
php -S localhost:8000
