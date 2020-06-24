<?php
/*
*	Clase para manejar la tabla planSuscripcion de la base de datos. Es clase hija de Validator.
*/
class PlanSuscripcion extends Validator
{
    // Declaración de atributos (propiedades).
    private $idPlanSuscripcion = null;
    private $cantidadPares = null;
    private $precio = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdPlanSuscripcion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idPlanSuscripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidadPares($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidadPares = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdPlanSuscripcion()
    {
        return $this->idPlanSuscripcion;
    }

    public function getCantidadPares()
    {
        return $this->cantidadPares;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function createPlanSuscripcion()
    {
        $sql = 'INSERT INTO planSuscripcion(cantidadPares, precio)
                VALUES(?, ?)';
        $params = array($this->cantidadPares, $this->precio);
        return Database::executeRow($sql, $params);
    }
 
    public function readAllPlanSuscripcion()
    {
        $sql = 'SELECT idplansuscripcion, cantidadPares, precio
                FROM planSuscripcion
                ORDER BY idPlanSuscripcion';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readPlanSuscripcion()
    {
        $sql = 'SELECT idplansuscripcion, cantidadPares, precio
                FROM planSuscripcion
                WHERE idPlanSuscripcion = ?';
        $params = array($this->idPlanSuscripcion);
        return Database::getRow($sql, $params);
    }

    public function updatePlanSuscripcion(){
            $sql = 'UPDATE planSuscripcion 
                    SET cantidadPares=?, precio=? 
                    WHERE idPlanSuscripcion=?';
            $params=array($this->cantidadPares, $this->precio, $this->idPlanSuscripcion);
            return Database::executeRow($sql, $params);
        }

    public function deletePlanSuscripcion()
    {
        $sql = 'DELETE FROM planSuscripcion
                WHERE idPlanSuscripcion = ?';
        $params = array($this->idPlanSuscripcion);
        return Database::executeRow($sql, $params);
    }
}
?>