<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Entities\Empleado;

final class EmpleadoTest extends TestCase
{
    public function testCreateEmpleadoInstance():void
    {
        //$empleadoService = EmpleadoService::getInstance();
        $empleado = new Empleado();
        
        
        
        $this->assertInstanceOf(\Entities\Empleado::class, $empleado);
    }
}