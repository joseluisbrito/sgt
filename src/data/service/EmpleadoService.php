<?php

namespace EntitiesService;

use Entities\Empleado;
use DataLayer\EntityManagerSingleton as ems;

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
     * The method to get a Singleton instance of EmpleadoService
     */
    public static function getInstance() {
        $subclass = static::class;
        if(!isset(self::$instance[$subclass])) {
            self::$instances[$subclass] = new static();
        }
        return self::$instances[$subclass];
    }
    
    /**
     * Persist an Empleado entity into database
     * @param Empleado $empleado
     */
    public function save(Empleado $empleado): Empleado
    {
        $ems = ems::getInstance()->getEM();
        $ems->persist($empleado);
        $ems->flush();
        return $empleado;
    }
    
    /**
     * Return all Empleado
     */
    public function findAll()
    {
        $ems = ems::getInstance()->getEM();
        $repo = $ems->getRepository('\Entities\Empleado');
        return $repo->findAll();
    }
    
    /**
     * Update an Empleado
     */
    public function update(Empleado $empleado)
    {
        $ems = ems::getInstance()->getEM();
        $ems->merge($empleado);
        $ems->flush();
        
    }
    
    /**
     * Find Empleado by Id
     */
    public function findById(int $id): Empleado {
        $ems = ems::getInstance()->getEM();
        $empleado = $ems->find('\Entities\Empleado', $id);
        return $empleado;
    }
}