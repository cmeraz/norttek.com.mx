param(
  [string]$MsgFile,
  [string]$Source,
  [string]$Sha1
)

if ($Source -in @('merge','squash')) { exit 0 }

$marker = '#IDIOMA:ES'
$content = Get-Content -Raw -Path $MsgFile
if ($content -match [regex]::Escape($marker)) { exit 0 }

$template = @"
$marker
# tipo(scope): resumen imperativo en español (máx ~72 chars)
# feat|fix|docs|style|refactor|perf|test|build|ci|chore
# Ej: feat(navbar): agrega animación de entrada al menú móvil

"@

($template + $content) | Set-Content -Path $MsgFile -Encoding UTF8

# Traducción básica (solo si la primera palabra es add o update)
$lines = Get-Content -Path $MsgFile
if ($lines.Length -gt 0) {
  if ($lines[0].ToLower().StartsWith('add ')) { $lines[0] = $lines[0].Replace('add','feat') }
  elseif ($lines[0].ToLower().StartsWith('update ')) { $lines[0] = $lines[0].Replace('update','feat') }
  Set-Content -Path $MsgFile -Value $lines -Encoding UTF8
}

exit 0
