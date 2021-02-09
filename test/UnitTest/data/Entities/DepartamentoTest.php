<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Entities\Departamento;
use Entities\Empleado;
use Entities\Motivo;

final class DepartamentoTest extends TestCase
{
    public function testAddEmpleadoGetEmpleado()
    {
        $stubEmpleado = $this->getMockBuilder(Empleado::class)
                ->getMock();
        
        $stubEmpleado->method('getId')
                ->willReturn(1);
        
        $departamento = new Departamento();
        $departamento->addEmpleado($stubEmpleado);
        
        $this->assertSame($stubEmpleado, $departamento->getEmpleadoById(1)) ;
        
    }
    
    public function testAddMotivoGetMotivo()
    {
        $stubMotivo = $this->getMockBuilder(Motivo::class)
                ->getMock();
        $stubMotivo->method('getId')
                ->willReturn(1);
        $departamento = new Departamento();
        $departamento->addMotivo($stubMotivo);
        
        $this->assertSame($stubMotivo, $departamento->getMotivoById(1));
    }
    
    public function testGetSetDepartamento()
    {
        $departamento = new Departamento();
        $departamento->setDepartamento("Mantenimiento");
        $this->assertSame("Mantenimiento", $departamento->getDepartamento());
    }

}