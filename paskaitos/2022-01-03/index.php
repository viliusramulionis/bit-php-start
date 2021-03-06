<?php

spl_autoload_register(function() {
    require __DIR__ . '/Crud/NameStore.php';
    require __DIR__ . '/Crud/NameModel.php';
});

require __DIR__ . '/vendor/autoload.php';

use Simplon\Mysql\Mysql;
use Simplon\Mysql\QueryBuilder\CreateQueryBuilder;
use Simplon\Mysql\QueryBuilder\ReadQueryBuilder;
use Crud\NameStore;
use Crud\NameModel;

$connection = new PDO("mysql:host=localhost;dbname=blogas", 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbConn = new Mysql($connection);

$store = new NameStore($dbConn);

//Nauju duomenu sukurimas

// $model = $store->create(
//     (new CreateQueryBuilder())->setModel(
//         (new NameModel())
//             ->setName('Johnny')
//             ->setAge(22)
//     )
// );

//Duomenu paemimas
$model = $store->read( new ReadQueryBuilder() );

foreach($model as $key => $val) {
    echo $val->getName() . '<br />';
}


$model = $store->create(

    (new CreateQueryBuilder())->setModel(

         (new NameModel())

            ->setName('Petras')

            ->setAge(60)

     )

);