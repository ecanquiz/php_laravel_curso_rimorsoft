# php_laravel_curso_rimorsoft
Php Laravel Curso Rimorsoft

SweetAlert in Laravel

$ composer create-project --prefer-dist laravel/laravel sweetalert

$ composer require uxweb/sweet-alert

(Go to config/app.php file and add access to the Service Provider and create an Alias.)

'providers' => [

    //

    UxWeb\SweetAlert\SweetAlertServiceProvider::class,

];

'aliases' => [

    //

    'Alert' => UxWeb\SweetAlert\SweetAlert::class,

];









