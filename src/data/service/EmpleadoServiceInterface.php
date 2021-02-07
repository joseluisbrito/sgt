<?php

namespace EntitiesService;

use Entities\Empleado;

// ISystem Interface

interface EmpleadoServiceInterface
{
    public function save(Empleado $empleado): Empleado;
    
}