<?php
/*
*	Clase para manejar la tabla departamento de la base de datos. Es clase hija de Validator.
*/
class CostoEnvio extends Validator
{
    // Declaración de atributos (propiedades).
    private $idDepartamento = null;
    private $departamento = null;
    private $costoEnvio = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdDepartamento($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idDepartamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDepartamento($value)
    {
        if ($this->validateString($value, 1, 20)) {
            $this->departamento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCostoEnvio($value)
    {
        if ($this->validateMoney($value)) {
            $this->costoEnvio = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    public function getDepartamento()
    {
        return $this->departamento;
    }

    public function getCostoEnvio()
    {
        return $this->costoEnvio;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function createDepartamento()
    {
        $sql = 'INSERT INTO departamento(departamento, costoEnvio)
                VALUES(?, ?)';
        $params = array($this->departamento, $this->costoEnvio);
        return Database::executeRow($sql, $params);
    }
 
    public function readAllDepartamento()
    {
        $sql = 'SELECT iddepartamento, departamento, costoEnvio
                FROM departamento
                ORDER BY idDepartamento';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readDepartamento()
    {
        $sql = 'SELECT iddepartamento, departamento, costoEnvio
                FROM departamento
                WHERE idDepartamento = ?';
        $params = array($this->idDepartamento);
        return Database::getRow($sql, $params);
    }

    public function updateDepartamento(){
        $sql = 'UPDATE departamento 
            SET departamento=?, costoEnvio=? 
            WHERE idDepartamento=?';
        $params=array($this->departamento, $this->costoEnvio, $this->idDepartamento);
        return Database::executeRow($sql, $params);
    }

    public function deleteCostoEnvio()
    {
        $sql = 'UPDATE departamento 
                SET costoEnvio = 0.00
                WHERE idDepartamento=?';
        $params = array($this->idDepartamento);
        return Database::executeRow($sql, $params);
    }
}
?>