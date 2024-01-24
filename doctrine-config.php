<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Определение пути к файлу автозагрузки Composer
$autoloadFile = __DIR__ . '/vendor/autoload.php';

if (!file_exists($autoloadFile)) {
    die('Composer dependencies not installed. Run "composer install" and try again.');
}

require_once $autoloadFile;


// Параметры подключения к базе данных
$connectionParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => DB_USER,
    'password' => DB_PASSWORD,
    'dbname'   => DB_NAME,
);

// Параметры конфигурации Doctrine
$config = Setup::createAnnotationMetadataConfiguration([], true, null, null, false);

// Получение EntityManager
$entityManager = EntityManager::create($connectionParams, $config);