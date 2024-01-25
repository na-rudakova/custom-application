<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

function activate_application_plugin() {
    $paths = [__DIR__ . "/lib/Entity"];
    $isDevMode = true;

    $dbParams = [
        'driver' => 'pdo_mysql',
        'user' => DB_USER,
        'password' => DB_PASSWORD,
        'dbname' => DB_NAME,
    ];

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    $entityManager = EntityManager::create($dbParams, $config);

    // Получаем платформу Doctrine и создаем таблицу, если она не существует
    $platform = $entityManager->getConnection()->getDatabasePlatform();
    $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
    $metadata = $entityManager->getMetadataFactory()->getAllMetadata();
    $schemaTool->updateSchema($metadata);
}

activate_application_plugin();