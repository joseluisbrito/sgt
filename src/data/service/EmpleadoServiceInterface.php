<?php

namespace EntitiesService;

use EntitiesService\Empleado;

// ISystem Interface

interface EmpleadoServiceInterface
{
    public function saveEmpleado(Empleado $empleado);
    
}