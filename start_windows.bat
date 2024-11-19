@echo off

openfiles >nul 2>nul
if %errorlevel% neq 0 (
    echo This script needs to be run with administrative privileges.
    echo Please run this script as an administrator.
    pause
    exit
)

php -v >nul 2>nul
if %errorlevel% equ 0 (
    echo PHP is already installed.
) else (
    echo PHP is not installed. Proceeding with PHP installation...
    echo Downloading PHP...
    powershell -Command "Invoke-WebRequest -Uri https://windows.php.net/downloads/releases/php-8.3.13-Win32-vs16-x64.zip -OutFile php.zip"
    echo Extracting PHP...
    powershell -Command "Expand-Archive -Path php.zip -DestinationPath C:\php -Force"
    echo Adding PHP to the PATH...
    setx PATH "%PATH%;C:\php"
    del php.zip
    echo PHP installation complete.
    echo Configuring PHP...
    powershell -Command "(gc 'C:\php\php.ini') -replace ';extension=intl', 'extension=intl' | Out-File -encoding ASCII 'C:\php\php.ini'"
    powershell -Command "(gc 'C:\php\php.ini') -replace ';extension=mbstring', 'extension=mbstring' | Out-File -encoding ASCII 'C:\php\php.ini'"
    echo PHP configuration complete.
)

echo Starting PHP server and Job Search app...
start cmd /K "cd /d %~dp0 && php -S localhost:8080"
start http://localhost:8080
