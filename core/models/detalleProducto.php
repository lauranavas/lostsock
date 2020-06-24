<?php
/*
*	Clase para manejar la tabla producto de la base de datos. Es clase hija de Validator.
*/

class DetalleProducto extends Validator
{
    // Declaración de atributos (propiedades).
    private $idDetalleProducto = null;
    private $existencia = null;
    private $idTalla = null;
    private $idProducto = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setIdDetalleProducto($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idDetalleProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setExistencia($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->existencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTalla($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idTalla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProducto($value)
    {
        if ( $this->validateNaturalNumber( $value ) ) {
            $this->idProducto = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */

    public function getIdDetalleProducto()
    {
        return $this->idDetalleProducto;
    }

    public function getExistencias()
    {
        return $this->existencia;
    }

    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /*
    *   Métodos para realizar las operaciones CRUD (search, create, read, update, delete).
    */
    public function createDetalleProducto()
    {
        $sql = 'INSERT INTO producto(existencia, idtalla, idproducto)
                VALUES(?, ?, ?)';
        $params = array( $this->existencia, $this->idTalla, $this->idProducto );
        return Database::executeRow( $sql, $params );
    }
    
    public function readAllDetalleProducto()
    {
        $sql = 'SELECT idDetalleProducto
                FROM detalleProducto
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::getRows( $sql, $params );
    }

    public function readDetalleProducto()
    {
        $sql = 'SELECT idDetalleProducto, existencia, idTalla, talla, idProducto
                FROM detalleProducto INNER JOIN talla USING(idtalla)
                WHERE idProducto = ?';
        $params = array( $this->idProducto );
        return Database::getRows( $sql, $params );
    }

    public function updateDetalleProducto(){
        $sql = 'UPDATE detalleproducto 
                SET existencia = ?
                WHERE idDetalleProducto = ?';
        $params=array( $this->existencia, $this->idDetalleProducto );
        return Database::executeRow( $sql, $params );
    }

    public function deleteDetalleProducto()
    {
        $sql = 'DELETE FROM detalleProducto
                WHERE idDetalleProducto = ?';
        $params = array( $this->idDetalleProducto );
        return Database::executeRow( $sql, $params );
    }
}