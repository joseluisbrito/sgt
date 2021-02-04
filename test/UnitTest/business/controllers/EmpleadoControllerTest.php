<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Business\Controllers\EmpleadoController;

final class EmpleadoControllerTest extends TestCase
{
    public function testGetEmpleadoControllerInstance():void
    {
        $empleadoController = EmpleadoController::getInstance();
        
        $this->assertInstanceOf(
                EmpleadoController::class,
                $empleadoController);
    }
}