<?php

namespace EntitiesService;

use Entities\Empleado;

// ISystem Interface

interface EmpleadoServiceInterface
{
    public function save(Empleado $empleado): Empleado;
    
    public function findAll();
    
    public function update(Empleado $empleado);
    
    public function findById(int $id): Empleado;
    
}