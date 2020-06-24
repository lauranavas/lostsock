<?php
/*
*	Clase para manejar la tabla categoria de la base de datos. Es clase hija de Validator.
*/
class Categoria extends Validator
{
    // Declaración de atributos (propiedades).
    private $idCategoria = null;
    private $categoria = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCategoria($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->categoria = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function createCategoria()
    { 
        $sql = 'INSERT INTO categoria(idCategoria, categoria)
                VALUES(DEFAULT, ?)';
        $params = array($this->categoria);
        return Database::executeRow($sql, $params);
    }

    public function readAllCategoria()
    {
        $sql = 'SELECT idCategoria, categoria
                FROM categoria
                ORDER BY idCategoria';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneCategoria()
    {
        $sql = 'SELECT idCategoria, categoria
                FROM categoria
                WHERE idCategoria = ?';
        $params = array($this->idCategoria);
        return Database::getRow($sql, $params);
    }

    public function updateCategoria(){
            $sql='UPDATE categoria SET categoria=? WHERE idCategoria=?';
            $params=array($this->categoria, $this->idCategoria);
            return Database::executeRow($sql, $params);
        }

    public function deleteCategoria()
    {
        $sql = 'DELETE FROM categoria
                WHERE idCategoria = ?';
        $params = array($this->idCategoria);
        return Database::executeRow($sql, $params);
    }
}
?>