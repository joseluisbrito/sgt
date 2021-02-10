<?php

namespace Entities;

// src/persistence/entities/Empleado.php

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="empleados",options={"collate"="utf8_spanish_ci"})
*/

class Empleado
{


  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  protected $id;
  
  /**
   * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="emplea")
   */
  protected $departamentoEmplea;

  /**
  * @ORM\Column(type="string")
  */
  protected $nombre;

  /**
  * @ORM\Column(type="string")
  */
  protected $user;

  /**
  * @ORM\Column(type="string")
  */
  protected $password;
  
  
  /**
  * @ORM\Column(type="boolean")
  */
  protected $activo;
  
  /**
  * @ORM\Column(type="datetime")
  */
  protected $lastLogin;
  
  /**
  * @ORM\Column(type="datetime")
  */
  protected $lastLogout;
  
  public function getId() {
    return $this->id;
  }
  
  function getNombre() {
      return $this->nombre;
  }

  function getUser() {
      return $this->user;
  }

  function getPassword() {
      return $this->password;
  }

  function setNombre($nombre): void {
      $this->nombre = $nombre;
  }

  function setUser($user): void {
      $this->user = $user;
  }

  function setPassword($password): void {
      $this->password = $password;
  }
  
  function getActivo() {
      return $this->activo;
  }

  function getLastLogin() {
      return $this->lastLogin;
  }

  function getLastLogout() {
      return $this->lastLogout;
  }

  function setActivo($activo): void {
      $this->activo = $activo;
  }

  function setLastLogin($lastLogin): void {
      $this->lastLogin = $lastLogin;
  }

  function setLastLogout($lastLogout): void {
      $this->lastLogout = $lastLogout;
  }



}