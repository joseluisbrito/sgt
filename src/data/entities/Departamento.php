<?php

namespace Entities;
use Entities\Empleado;

class Departamento
{
    /**
     * 
     * @var Empleado
     */
    protected $empleados = [];
    
    /**
     * 
     * @var Motivo
     */
    protected $motivos = [];
    
    /**
     * Add Empleado to the Departamento
     * @param Empleado $empleado
     */
    
    protected $departamento;
    
    public function addEmpleado(Empleado $empleado)
    {
        array_push($this->empleados, $empleado);
    }
    
    /**
     * Look for an Employee in the department
     * @param int $id
     * @return Empleado
     */
    public function getEmpleadoById(int $id)
    {
        foreach ($this->empleados as $e)
        {
            if($e->getId() === $id)
                return $e;
        }
        return false;
    }
    
    /**
     * Add Motivo to this departamento
     */
    public function addMotivo(Motivo $motivo)
    {
        array_push($this->motivos, $motivo);
    }
    
    /**
     * Search for a reason associated with the department
     */
    public function getMotivoById(int $id)
    {
        foreach($this->motivos as $m)
        {
            if($m->getId() === $id)
                return $m;
        }
        return false;
    }
    
    /**
     * Set departamento property
     * @param type String
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }
    
    public function getDepartamento()
    {
        return $this->departamento;
    }
    
}
