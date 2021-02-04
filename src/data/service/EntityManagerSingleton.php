<?php

require_once '../../../vendor/autoload.php';

namespace EntitiesService;


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerSingleton
{
    private static $instances = [];
    private $em = null;
    private $conn = null;
    private $config = null;
    
    protected function __construct() {
        $this->setEntityManager();
    }
    
    /**
     * Cloning and serialization are note permitted for singletons.
     */
    protected function __clone() {
        
    }
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
    
        /**
     * The method to get a Singleton instance of CtrlSystem
     */
    public static function getInstance() {
        $subclass = static::class;
        if(!isset(self::$instance[$subclass])) {
            self::$instances[$subclass] = new static();
            
        }
        return self::$instances[$subclass];
    }
    
    
    private static $isDevMode = true;
    private static $proxyDir = null;
    private static $cache = null;
    private static $useSimpleAnnotationReader = false;
               
    private function setEntityManager() {
        
        $this->conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
            
        );
        
        $this->config = Setup::createAnnotationMetadataConfiguration(
            array(__DIR__."/db.sqlite"),
            self::$isDevMode,
            self::$proxyDir,
            self::$cache,
            self::$useSimpleAnnotationReader
            );
        $this->em = EntityManager::create($this->conn, $this->config);
    }
    
    public function getEM() {
        $this->setEntityManager();
        return $this->em;
    }
    
}

