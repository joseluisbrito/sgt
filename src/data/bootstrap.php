<?php

require_once "../../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Config\DatabaseConfig;

// Simple and "default" Doctrine ORM configuration for annotations
$isDevMode = false;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetaDataConfiguration(
    array(
      __DIR__."/entities"
    ),
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
  );
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$connectionParams = array(
                'dbname' => DatabaseConfig::$db_name,
            'user' => DatabaseConfig::$db_user,
            'password' => DatabaseConfig::$db_password,
                    'driver' => DatabaseConfig::$driver,
        'host' => 'localhost',
                'charset'  => 'utf8',
            'driverOptions' => array(
                1002 => 'SET NAMES utf8'
            )

);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

// obtaining the entity EntityManager
$entityManager = EntityManager::create($conn, $config);
