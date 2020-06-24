<?php
/*
*	Clase para manejar la tabla suscripcion de la base de datos. Es clase hija de la clase Validator.
*/
class Suscripcion extends Validator{
    // 
    private $idSuscripcion = null;
    private $estado = null;
    private $idTalla = null;
    private $idFrecuencia = null;
    private $idCategoria = null;
    private $idCliente = null;
    private $idPlanSuscripcion = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */

    public function setIdSuscripcion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idSuscripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    
    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdTalla($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idTalla = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdFrecuencia($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idFrecuencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCategoria($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCategoria = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idCliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdPlanSuscripcion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->idPlanSuscripcion = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdSuscripcion()
    {
        return $this->idSuscripcion;
    }

    public function getEstado()
    {
        return $this->idEstado;
    }

    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getIdFrecuencia()
    {
        return $this->idFrecuencia;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }
    
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getIdPlanSuscripcion()
    {
        return $this->idPlanSuscripcion;
    }

    public function readAllSuscripcion()
    {
        $sql = 'SELECT s.idsuscripcion, cl.nombres, cl.apellidos, s.estado, tl.talla, f.frecuencia, ct.categoria, 
                tp.tipo, ps.cantidadpares, ps.precio, dr.detalledireccion, dp.departamento, dp.costoenvio
                FROM suscripcion s JOIN talla tl ON s.idtalla = tl.idtalla 
                JOIN frecuencia f ON s.idfrecuencia = f.idfrecuencia 
                JOIN categoria ct ON s.idcategoria = ct.idcategoria 
                JOIN cliente cl ON s.idcliente = cl.idcliente 
                JOIN plansuscripcion ps ON s.idplansuscripcion = ps.idplansuscripcion
                JOIN tipoproducto tp ON s.idtipoproducto = tp.idtipoproducto
                JOIN direccion dr ON s.iddireccion = dr.iddireccion 
                JOIN departamento dp ON dr.iddepartamento = dp.iddepartamento';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneSuscripcion()
    {
        $sql = 'SELECT s.idsuscripcion, cl.nombres, cl.apellidos, s.estado, tl.talla, f.frecuencia, ct.categoria, 
                tp.tipo, ps.cantidadpares, ps.precio, dr.detalledireccion, dp.departamento, dp.costoenvio, tp.tipo
                FROM suscripcion s JOIN talla tl ON s.idtalla = tl.idtalla 
                JOIN frecuencia f ON s.idfrecuencia = f.idfrecuencia 
                JOIN categoria ct ON s.idcategoria = ct.idcategoria 
                JOIN cliente cl ON s.idcliente = cl.idcliente 
                JOIN plansuscripcion ps ON s.idplansuscripcion = ps.idplansuscripcion
                JOIN tipoproducto tp ON s.idtipoproducto = tp.idtipoproducto
                JOIN direccion dr ON s.iddireccion = dr.iddireccion 
                JOIN departamento dp ON dr.iddepartamento = dp.iddepartamento
                WHERE idsuscripcion=?';
        $params = array($this->idSuscripcion);
        return Database::getRow($sql, $params);
    }

    public function disableSuscripcion()
    {
        $sql = 'UPDATE suscripcion 
                SET estado = ?
                WHERE idSuscripcion = ?';
        $params = array($this->estado, $this->idSuscripcion);
        return Database::executeRow($sql, $params);
    }
    
}
?>