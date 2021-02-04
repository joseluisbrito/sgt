<?php

namespace Business;

// Factory of controllers


class Factory
{
    public static function getEmpleadoController(): EmpleadoInterface
    {
        return EmpleadoController::getInstance();
    }
}