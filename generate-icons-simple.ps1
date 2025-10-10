Add-Type -AssemblyName System.Drawing

# Configuracion
$logoPath = "c:\laragon\www\norttek.com.mx\assets\img\logo-norttek.png"
$outputDir = "c:\laragon\www\norttek.com.mx\assets\img\pwa\"

# Tamanios requeridos
$sizes = @(72, 96, 128, 144, 152, 192, 384, 512)

Write-Host "[PWA] Generador de Iconos PWA" -ForegroundColor Cyan
Write-Host "====================================`n"

# Verificar que existe el logo
if (-not (Test-Path $logoPath)) {
    Write-Host "[ERROR] No se encontro el logo en: $logoPath" -ForegroundColor Red
    exit 1
}

Write-Host "[OK] Logo encontrado: logo-norttek.png" -ForegroundColor Green
Write-Host "[INFO] Directorio de salida: assets/img/pwa/`n" -ForegroundColor Yellow

try {
    # Cargar imagen original
    $originalImage = [System.Drawing.Image]::FromFile($logoPath)
    Write-Host "[INFO] Tamanio original: $($originalImage.Width)x$($originalImage.Height)px`n"
    
    foreach ($size in $sizes) {
        $outputPath = Join-Path $outputDir "icon-${size}x${size}.png"
        
        Write-Host "[...] Generando icon-${size}x${size}.png..." -NoNewline
        
        # Crear bitmap nuevo
        $newImage = New-Object System.Drawing.Bitmap($size, $size)
        $graphics = [System.Drawing.Graphics]::FromImage($newImage)
        
        # Configurar calidad alta
        $graphics.InterpolationMode = [System.Drawing.Drawing2D.InterpolationMode]::HighQualityBicubic
        $graphics.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::HighQuality
        $graphics.PixelOffsetMode = [System.Drawing.Drawing2D.PixelOffsetMode]::HighQuality
        $graphics.CompositingQuality = [System.Drawing.Drawing2D.CompositingQuality]::HighQuality
        
        # Fondo transparente
        $graphics.Clear([System.Drawing.Color]::Transparent)
        
        # Calcular posicion centrada con padding 10%
        $padding = [int]($size * 0.1)
        $drawSize = $size - ($padding * 2)
        
        # Dibujar imagen redimensionada
        $destRect = New-Object System.Drawing.Rectangle($padding, $padding, $drawSize, $drawSize)
        $graphics.DrawImage($originalImage, $destRect, 0, 0, $originalImage.Width, $originalImage.Height, [System.Drawing.GraphicsUnit]::Pixel)
        
        # Guardar
        $newImage.Save($outputPath, [System.Drawing.Imaging.ImageFormat]::Png)
        
        # Limpiar
        $graphics.Dispose()
        $newImage.Dispose()
        
        Write-Host " [OK]" -ForegroundColor Green
    }
    
    # Limpiar
    $originalImage.Dispose()
    
    Write-Host "`n====================================`n"
    Write-Host "[SUCCESS] Iconos generados exitosamente!" -ForegroundColor Green
    Write-Host "[INFO] Total de iconos: $($sizes.Count)" -ForegroundColor Cyan
    Write-Host "`n[PATH] Ubicacion: $outputDir" -ForegroundColor Yellow
    Write-Host "`n[DONE] Los iconos estan listos para usar en tu PWA`n" -ForegroundColor Magenta
    
} catch {
    Write-Host " [FAIL]" -ForegroundColor Red
    Write-Host "`n[ERROR] $_" -ForegroundColor Red
    Write-Host "[TIP] Asegurate de que el logo sea accesible y no este corrupto.`n" -ForegroundColor Yellow
    exit 1
}
