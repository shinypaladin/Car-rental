# Backup existing .env file
if (Test-Path ".env") {
    Copy-Item ".env" ".env.backup" -Force
    echo "Backed up .env to .env.backup"
}

# Copy .env.dusk.local to .env
if (Test-Path ".env.dusk.local") {
    Copy-Item ".env.dusk.local" ".env" -Force
    echo "Copied .env.dusk.local to .env"
}

# Clear any cached configurations so Laravel reads the new .env file
echo "Clearing all Laravel configuration/route/view caches..."
& "C:\Users\ASUS\php\php.exe" artisan config:clear
& "C:\Users\ASUS\php\php.exe" artisan cache:clear
& "C:\Users\ASUS\php\php.exe" artisan route:clear
& "C:\Users\ASUS\php\php.exe" artisan view:clear

# Create testing SQLite database if it doesn't exist
if (-not (Test-Path "car_rental_testing")) {
    New-Item -Path "car_rental_testing" -ItemType File | Out-Null
    echo "Created testing database: car_rental_testing"
}

# Start php artisan serve
echo "Starting local server on http://127.0.0.1:8001..."
$server = Start-Process "C:\Users\ASUS\php\php.exe" -ArgumentList "artisan serve --host=127.0.0.1 --port=8001" -PassThru -NoNewWindow

# Wait 3 seconds for server to start
Start-Sleep -Seconds 3

try {
    # Migrate database
    echo "Running database migrations for tests..."
    & "C:\Users\ASUS\php\php.exe" artisan migrate:fresh --force

    # Run Laravel Dusk browser tests
    echo "Running Laravel Dusk browser tests..."
    & "C:\Users\ASUS\php\php.exe" artisan dusk
    $exitCode = $LASTEXITCODE
} finally {
    # Stop the server
    echo "Stopping local server..."
    Stop-Process -Id $server.Id -Force -ErrorAction SilentlyContinue

    # Restore original .env file
    if (Test-Path ".env.backup") {
        Copy-Item ".env.backup" ".env" -Force
        Remove-Item ".env.backup" -Force
        echo "Restored original .env"
    }

    # Clear cache again to restore original configuration
    echo "Clearing cache to restore original environment..."
    & "C:\Users\ASUS\php\php.exe" artisan config:clear
    & "C:\Users\ASUS\php\php.exe" artisan cache:clear
    & "C:\Users\ASUS\php\php.exe" artisan route:clear
    & "C:\Users\ASUS\php\php.exe" artisan view:clear
}

exit $exitCode
