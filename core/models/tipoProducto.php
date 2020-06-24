<?php
/*
*	Clase para manejar la tabla tipoProducto de la base de datos. Es clase hija de Validator.
*/
class TipoProducto extends Validator
{
    // Declaración de atributos (propiedades).
    private $idTipoProducto = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdTipoProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTipoProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipoProducto($value)
    {
        if ($this->validateString($value, 1, 30)) {
            $this->tipo = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdTipoProducto()
    {
        return $this->idTipoProducto;
    }

    public function getTipoProducto()
    {
        return $this->tipo;
    }

    public function createTipoProducto()
    { 
        $sql = 'INSERT INTO tipoProducto(idTipoProducto, tipo)
                VALUES(DEFAULT, ?)';
        $params = array($this->tipo);
        return Database::executeRow($sql, $params);
    }

    public function readAllTipoProducto()
    {
        $sql = 'SELECT idTipoProducto, tipo
                FROM tipoProducto
                ORDER BY idTipoProducto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneTipoProducto()
    {
        $sql = 'SELECT idTipoProducto, tipo
                FROM tipoProducto
                WHERE idTipoProducto = ?';
        $params = array($this->idTipoProducto);
        return Database::getRow($sql, $params);
    }

    public function updateTipoProducto(){
            $sql='UPDATE tipoProducto SET tipo=? WHERE idTipoProducto=?';
            $params=array($this->tipo, $this->idTipoProducto);
            return Database::executeRow($sql, $params);
        }

    public function deleteTipoProducto()
    {
        $sql = 'DELETE FROM tipoProducto
                WHERE idTipoProducto = ?';
        $params = array($this->idTipoProducto);
        return Database::executeRow($sql, $params);
    }
}
?>