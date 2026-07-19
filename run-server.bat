@echo off
echo ===================================================
echo   Laravel Server Startup Script (with Auto-Clear)
echo ===================================================
echo.

echo 1. Stopping any running PHP servers/processes...
taskkill /f /im php.exe 2>nul

echo.
echo 2. Clearing Laravel Cache...
C:\Users\ASUS\php\php.exe artisan config:clear
C:\Users\ASUS\php\php.exe artisan cache:clear
C:\Users\ASUS\php\php.exe artisan route:clear
C:\Users\ASUS\php\php.exe artisan view:clear

echo 3. Starting Laravel Server in a new window...
start "Laravel Server" cmd /k C:\Users\ASUS\php\php.exe artisan serve --host=0.0.0.0

echo.
echo ===================================================
echo   Server started! Open: http://127.0.0.1:8000
echo   Or from Wifi: http://[YOUR-WIFI-IP]:8000
echo ===================================================
echo.
