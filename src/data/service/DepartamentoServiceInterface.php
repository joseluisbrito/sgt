<?php

namespace EntitiesService;

use Entities\Departamento;
use Entities\Motivo;

// ISystem Interface

interface DepartamentoServiceInterface
{
    public function save(Departamento $departamento): Departamento;
    
    public function addMotivo(String $motivo): Motivo;
    
    public function findById(int $id): Departamento;
    
    public function getAllMotivo(Departamento $departamento);
    
    public function findAll();
    
    public function update(Departamento $departamento): Departamento;
    

    
}