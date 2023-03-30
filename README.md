<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre Laravel Project test-espumados

Para clonarlo y ver funcionamiento, asegurese de relaizar los siguientes pasos
- Editar el nombre del archivo .env.example por solo .env
- composer install
- composer dumpautoload
- php artisan optimize  o php artisan config:cache
- Revisar versión de Node e instarlo en el equipo
- Realizar npm install --save-dev


Luego cree una base de datos en su servidor local con el nombre de test_espumados

Debe tener en cuenta que debe realizar la migracion con php artisan migrate --seed
si tiene paso por alto el paso del seeder realice php artisan migrate:refresh --seed

Luego realizar el npm run dev para que compile los componentes, vistas y archivos creados con vue 