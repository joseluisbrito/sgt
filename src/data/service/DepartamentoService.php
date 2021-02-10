<?php

namespace EntitiesService;

use Entities\Empleado;
use Entities\Motivo;
use Entities\Departamento;
use DataLayer\EntityManagerSingleton as ems;


// DepartamentoService

class DepartamentoService
{
    private static $instance = [];
    
    protected function __construct()
    {
        
    }
    
    /**
     * Cloning and serialization are note permitted for singletons.
     */
    protected function __clone()
    {
        
    }
    
    protected function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
    
    /**
     * The metod to get a Singleton instance of DepartamentoService
     */
    public function getInstance()
    {
        $subclass = static::class;
        if(!isset(self::$instance[$subclass])) {
            self::$instance[$subclass] = new static();
        }
        return self::$instance[$subclass];
    }
    
    /**
     * Persist an Departamento entty into database
     * @param Departamento $departamento
     */
    public function save(Departamento $departamento)
    {
        $ems = ems::getInstance()->getEM();
        $repo = $ems->getRepository('\Entities\Empleado');
        return $repo->findAll();
    }
}