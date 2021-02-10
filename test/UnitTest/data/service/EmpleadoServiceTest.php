<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use EntitiesService\EmpleadoService;
use EntitiesService\EmpleadoServiceInterface;
use EntitiesService\DepartamentoService;
use EntitiesService\DepartamentoServiceInterface;
use \Tests\DatabaseFixture;
use Entities\Empleado;
use Entities\Departamento;


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
        $this->loadFixture('fixture_empty_empleados_1rowDepartamento');
        
        $departamentoService = DepartamentoService::getInstance();
        
        $empleado = new Empleado();
        $empleado->setActivo(true);
        $empleado->setNombre("José");
        $empleado->setUser("jbrito");
        $empleado->setPassword("123456");
        $date = new \DateTime();
        $empleado->setLastLogin($date);
        $empleado->setLastLogout($date);
        
        $departamento = $departamentoService->findById(1);     
        
        $empleado->setDepartamentoEmplea($departamento);
        
        $empleadoService = EmpleadoService::getInstance();
        $empleadoService->save($empleado);

        $this->assertIsNumeric($empleado->getId());
        
        $this->loadFixture('fixture_empty_empleados_1rowDepartamento');
  
    }
    
    public function testGetAllEmpleado(): void
    {
        $this->loadFixture('fixture_3rows_empleado');
        
        $empleadoService = EmpleadoService::getInstance();        
        $this->assertCount(3, $empleadoService->findAll());
        
        $this->loadFixture('fixture_empty_empleados_1rowDepartamento');
    }
    
    public function testUpdateEmpleado()
    {
        $this->loadFixture('fixture_3rows_empleado');
        
        $empleadoService = EmpleadoService::getInstance();
        $empleado = $empleadoService->findById(1);
        $empleado->setNombre("José Brito");
        $empleadoService->update($empleado);
        $this->assertSame("José Brito", $empleado->getNombre());
        
        $this->loadFixture('fixture_empty_empleados_1rowDepartamento');
    }
    
    private function loadFixture($fixtureFileName)
    {
        $fixture = new DatabaseFixture();
        $fixture->load($fixtureFileName);
    }
}