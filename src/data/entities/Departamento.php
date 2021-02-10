<?php

namespace Entities;

// src/persistence/entities/Departamento.php

use Entities\Empleado;
use Entities\Motivo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="departamentos")
 */
class Departamento
{
    /**
     * 
     * @var Empleado
     */
    /**
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Motivo", mappedBy="departamentoAtiende")
     * @var Motivo[] An ArrayColletion of Motivo objects.
     */
    protected $atiende = [];
    
    /**
     * @ORM\OneToMany(targetEntity="Empleado", mappedBy="departamentoEmplea")
     * @var Empleado[] An ArrayCollection of Empleado objects.
     */
    protected $emplea = [];
    

    /**
     * @ORM\Column(type="string")
     * @var String departamento
     */
    protected $departamento;

    /**
     * Add Empleado to the Departamento
     * @param Empleado $empleado
     */    
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
    
    /**
     * Return current departamento name
     * @return String
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    
}
