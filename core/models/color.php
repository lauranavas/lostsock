<?php
/*
*	Clase para manejar la tabla color de la base de datos. Es clase hija de Validator.
*/
class Color extends Validator
{
    // Declaración de atributos (propiedades).
    private $idColor = null;
    private $color = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdColor($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idColor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setColor($value)
    {
        if ($this->validateString($value, 1, 20)) {
            $this->color = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdColor()
    {
        return $this->idColor;
    }

    public function getColor()
    {
        return $this->color;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function createColor()
    {
        $sql = 'INSERT INTO color(idColor, color)
                VALUES(DEFAULT, ?)';
        $params = array($this->color);
        return Database::executeRow($sql, $params);
    }

    public function readAllColor()
    {
        $sql = 'SELECT idColor, color
                FROM color
                ORDER BY idColor';
        $params = null;
        return Database::getRows($sql, $params);
    }


    public function readOneColor()
    {
        $sql = 'SELECT idColor, color
                FROM color
                WHERE idColor = ?';
        $params = array($this->idColor);
        return Database::getRow($sql, $params);
    }

    public function updateColor(){
            $sql='UPDATE color SET color=? WHERE idColor=?';
            $params=array($this->color, $this->idColor);
            return Database::executeRow($sql, $params);
    }

    public function deleteColor()
    {
        $sql = 'DELETE FROM color
                WHERE idColor = ?';
        $params = array($this->idColor);
        return Database::executeRow($sql, $params);
    }

   
}
?>