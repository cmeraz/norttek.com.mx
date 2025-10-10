# Script para generar iconos PWA desde el logo de Norttek
# Requiere: ImageMagick instalado (https://imagemagick.org/script/download.php)

$sourceLogo = "logo-norttek.png"
$outputDir = "pwa"

# Verificar si existe ImageMagick
if (-not (Get-Command "magick" -ErrorAction SilentlyContinue)) {
    Write-Host "❌ ImageMagick no está instalado." -ForegroundColor Red
    Write-Host "Descárgalo de: https://imagemagick.org/script/download.php" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "Alternativa: Usa https://www.pwabuilder.com/imageGenerator" -ForegroundColor Cyan
    exit 1
}

# Crear directorio si no existe
if (-not (Test-Path $outputDir)) {
    New-Item -ItemType Directory -Path $outputDir | Out-Null
    Write-Host "✅ Directorio 'pwa' creado" -ForegroundColor Green
}

# Verificar que existe el logo
if (-not (Test-Path $sourceLogo)) {
    Write-Host "❌ No se encontró $sourceLogo" -ForegroundColor Red
    Write-Host "Coloca el logo de Norttek en esta carpeta y ejecuta nuevamente." -ForegroundColor Yellow
    exit 1
}

Write-Host "🎨 Generando iconos PWA..." -ForegroundColor Cyan
Write-Host ""

# Definir tamaños de iconos
$sizes = @(72, 96, 128, 144, 152, 192, 384, 512)

foreach ($size in $sizes) {
    $outputFile = "$outputDir/icon-${size}x${size}.png"
    
    Write-Host "  → Generando icon-${size}x${size}.png..." -NoNewline
    
    try {
        & magick convert $sourceLogo -resize "${size}x${size}" -background none -gravity center -extent "${size}x${size}" $outputFile
        
        if (Test-Path $outputFile) {
            Write-Host " ✅" -ForegroundColor Green
        } else {
            Write-Host " ❌" -ForegroundColor Red
        }
    } catch {
        Write-Host " ❌ Error: $($_.Exception.Message)" -ForegroundColor Red
    }
}

Write-Host ""
Write-Host "✅ Iconos generados exitosamente en la carpeta '$outputDir'" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Próximos pasos:" -ForegroundColor Cyan
Write-Host "  1. Verifica los iconos generados"
Write-Host "  2. Sube la carpeta completa al servidor en assets/img/pwa/"
Write-Host "  3. Prueba la PWA en Chrome DevTools → Application → Manifest"
Write-Host ""
