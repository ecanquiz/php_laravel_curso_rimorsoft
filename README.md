# php_laravel_curso_rimorsoft
Php Laravel Curso Rimorsoft

SweetAlert in Laravel.................................................................

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

Generate UUID......................................................................

$ composer require webpatser/laravel-uuid

Generate PDF reports...............................................................

$ composer require barryvdh/laravel-dompdf

(After installation we immediately configure what is necessary in config / app.php)

<?php

return [

    'providers' => [

        Barryvdh\DomPDF\ServiceProvider::class,

    ],

    'aliases' => [

        'PDF' => Barryvdh\DomPDF\Facade::class,
    ],

];

$ php artisan make:model Product -a

(We configure the factory in database/factories/ProductFactory.php)

<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    return [

        'name' => $faker->text(rand(32, 64)),

        'description' => $faker->text(rand(256, 512)),

        'stock' => rand(5, 25)

    ];

});

$ php artisan make:seeder ProductsTableSeeder

<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    public function run()
    {

        factory(App\Product::class, 12)->create();

    }
}

$ php artisan migrate:refresh --seed

Export spreadsheet (Excel).................................................

$ composer require maatwebsite/excel

$ php artisan make:export ProductsExport --model=Product

Then, in config/app.php

<?php

return [

    'providers' => [

        Maatwebsite\Excel\ExcelServiceProvider::class,

    ],

    'aliases' => [

        'Excel' => Maatwebsite\Excel\Facades\Excel::class,

    ],

];



















































