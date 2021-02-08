<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use EntitiesService\EmpleadoService;
use EntitiesService\EmpleadoServiceInterface;
use \Tests\DatabaseFixture;
use Entities\Empleado;


final class EmpleadoServiceTest extends TestCase
{
    
    public function testGetEmpleadoServiceInstance():void
    {
        $empleadoService = EmpleadoService::getInstance();
        
        $this->assertInstanceOf(
                \EntitiesService\EmpleadoService::class,
                $empleadoService);
        
    }
    
    public function testSaveEmpleado(): void
    {
        $fixture = new DatabaseFixture();
        $fixture->load('table_empleado_empty_fixture');
        
        $empleadoService = EmpleadoService::getInstance();
        
        $empleado = new Empleado();
        $empleado->setActivo(true);
        $empleado->setNombre("José");
        $empleado->setUser("jbrito");
        $empleado->setPassword("123456");
        $date = new \DateTime();
        $empleado->setLastLogin($date);
        $empleado->setLastLogout($date);
        
        $empleadoService->save($empleado);
        $this->assertIsNumeric($empleado->getId());
        
        $fixture->load('table_empleado_empty_fixture');
  
    }
    
    public function testGetAllEmpleado(): void
    {
        $fixture = new DatabaseFixture();
        $fixture->load('table_empleado_3rows_fixture');
        $empleadoService = EmpleadoService::getInstance();        
        $this->assertCount(3, $empleadoService->findAll());
        $fixture->load('table_empleado_empty_fixture');
    }
    
    public function testUpdateEmpleado()
    {
        $fixture = new DatabaseFixture();
        $fixture->load('table_empleado_3rows_fixture');
        $empleadoService = EmpleadoService::getInstance();
        $empleado = $empleadoService->findById(1);
        $empleado->setNombre("José Brito");
        $empleadoService->update($empleado);
        $this->assertSame("José Brito", $empleado->getNombre());
        $fixture->load('table_empleado_empty_fixture');
    }
}