@echo off
chcp 65001 >nul
set "MSG=%~1"
if "%MSG%"=="" set "MSG=Aktualizacja projektu - %date% %time%"

echo ====================================
echo  Wysylanie zmian do GitHuba...
echo ====================================
echo.

git add -A
git commit -m "%MSG%"
git push origin main

echo.
echo ====================================
echo  Gotowe! Sprawdz repo na GitHubie.
echo ====================================
timeout /t 3 >nul
