<?php

namespace Entities;

// src/persistence/entities/Motivo.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="motivos")
 */
class Motivo
{
    /**
     * Id
     * @var id int
     */
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $movito;
    
    
    /**
     * 
     @ORM\ManyToOne(targetEntity="Departamento", inversedBy="atiende")
     */
    protected $departamentoAtiende;
    
    
    /**
     * Return current id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    
    function getMovito() {
        return $this->movito;
    }

    function setMovito($movito): void {
        $this->movito = $movito;
    }


}