<?php

namespace Business\Controllers;

use Business\Interfaces\EmpleadoInterface;

// EmpleadoController

class EmpleadoController implements EmpleadoInterface
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
    
    /*
    public function addEmpleado(Empleado $empleado) {
        $em = EntityManagerSingleton::getInstance();

        $empleado = new Empleado();

        $empleado->setActivo(true);
        $empleado->setNombre("Antonio Banderas");
        $empleado->setPassword("kkkkkk");
        $empleado->setUsuario("abandera");
        $date = new \DateTime('2018-05-09');
        $empleado->setLastLogin($date);
        $empleado->setLastLogout($date);

        $em->getEM()->persist($empleado);
        $em->getEM()->flush();
    }
    */
    
    public function login($usuario, $password) {
        return "";
    }
}