<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Entities\Empleado;

final class EmpleadoTest extends TestCase
{
    public function testCreateEmpleadoInstance():void
    {
        $empleado = new Empleado();    
        $this->assertInstanceOf(\Entities\Empleado::class, $empleado);
    }
    
    public function testGetterSetterNombreEmpleado(): void
    {
        $empleado = new Empleado();
        $empleado->setNombre("José");
        $this->assertEquals("José", $empleado->getNombre());
    }
    
    public function testGetterSetterActivoEmpleado(): void
    {
        $empleado = new Empleado();
        $empleado->setActivo(true);
        $this->assertTrue($empleado->getActivo());
    }
    
    public function testGetterSetterPasswordEmpleado(): void
    {
        $empleado = new Empleado();
        $empleado->setPassword("123456");
        $this->assertSame("123456",$empleado->getPassword());
    }
    
    public function testGetterSetterLastLoginEmpleado(): void
    {
        $empleado = new Empleado();
        $datetime = new DateTime();
        $empleado->setLastLogin($datetime);
        $this->assertSame($datetime, $empleado->getLastLogin());
    }
    
    public function testGetterSetterLastLogoutEmpleado(): void
    {
        $empleado = new Empleado();
        $datetime = new DateTime();
        $empleado->setLastLogout($datetime);
        $this->assertSame($datetime, $empleado->getLastLogout());
    }
    
    public function testGetterSetterUserEmpleado(): void
    {
        $empleado = new Empleado();
        $empleado->setUser("jbrito");
        $this->assertSame("jbrito", $empleado->getUser());
    }

}