<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use EntitiesService\EmpleadoService;

final class EmpleadoServiceTest extends TestCase
{
    public function testGetEmpleadoServiceInstance():void
    {
        $empleadoService = EmpleadoService::getInstance();
        
        $this->assertInstanceOf(
                \EntitiesService\EmpleadoService::class,
                $empleadoService);
    }
}