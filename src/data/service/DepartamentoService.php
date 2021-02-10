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
    
    public function addMotivo(Motivo $motivo)
    {
        //TODO: implement this
    }
    
    public function findById(int $id): Departamento
    {
        $ems = ems::getInstance()->getEM();
        $departamento = $ems->find('\Entities\Departamento', $id);
        return $departamento;
    }
    
    public function getAllMotivo()
    {
        // TODO: implement this
    }
    
    public function findAll()
    {
        // TODO: implement this
    }
    
    public function update(Departamento $departamento): Departamento
    {
        // TODO: implement this
    }
    
}