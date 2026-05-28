# Identifica a pasta onde o script está rodando
$Base = "$PSScriptRoot\php"

# Define o "motor" PHP
Set-Alias -Name php -Value "$Base\php.exe"

# Define a ferramenta Composer (agora apontando para dentro da pasta php)
function composer { php "$Base\composer.phar" @args }

Write-Host "----------------------------------------------" -ForegroundColor Cyan
Write-Host "Ambiente Laravel Pronto,Thayná!" -ForegroundColor Green
Write-Host "----------------------------------------------" -ForegroundColor Cyan
php -v
composer --version