<?php

namespace EntitiesService;

use Data\EntityManagerSingleton;

// EmpleadoService

class EmpleadoService implements EmpleadoServiceInterface
{
    private static $instances = [];
    
    protected function __construct() {

    }
    
    /**
     * Cloning and serialization are note permitted for singletons.
     */
    protected function __clone() {
        
    }
    public function __wakeup() {
        throw new \Exception("Cannot unserialize singleton");
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
    
    public function saveEmpleado(Empleado $empleado) {
        EntityManagerSingleton::getInstance();
        
 
    }
}