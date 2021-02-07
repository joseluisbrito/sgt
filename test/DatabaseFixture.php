<?php

namespace Tests;

use Config\DatabaseConfig;

/**
 * DatabaseFixture can handle database to load fixtures from .sql files.
 * The Database settings (user, password, etc.) came from DatabaseConfig class.
 * Dont use this at production environment!!!
 */
class DatabaseFixture
{

    protected $conn = null;
    protected $sqlFile = null;
    protected $sqlFileName = null;



    /**
     * Make a conection
     */
    private function connect()
    {
        try {
            $this->conn = new \PDO('mysql:host=localhost;dbname='
                    .DatabaseConfig::$db_name, DatabaseConfig::$db_user,
                    DatabaseConfig::$db_password);
        } catch (PDOException $e) {
            throw new Exception("DB conection error");
        }
    }
    
    /**
     * Load a fixture file from Fixtures folder
     */
    private function loadFixtureFile()
    {
        $this->sqlFile = file_get_contents(__DIR__.'/Fixtures/'.$this->sqlFileName.'.sql');
    }
    
    /**
     * Load a fixture file to the database
     * @param String $fixtureFileName The file name to be loaded
     */
    public function load($fixtureFileName)
    {
        $this->connect();
        $this->sqlFileName = $fixtureFileName;
        $this->loadFixtureFile();
        $this->conn->exec($this->sqlFile);
    }

}

