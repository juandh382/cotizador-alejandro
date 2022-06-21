<?php

/**
 * Description of cotizaciones
 *
 * @author aleja
 */
class cotizacion
{
    //put your code here

    function obtenerCotizaciones()
    {
        global $gbd;
        $sql = "SELECT * FROM cotizaciones";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function agregar($empresa, $idCotizacion2, $fechaInicio, $fechaTermino, $insumos, $comentarios, $cantidad, $valorUnitario, $porcentaje, $despacho)
    {
        global $gbd;
        //  if(!$this->existeNombre($nombreCompleto)){  
        $sql = "INSERT INTO cotizaciones (empresa, idCotizacion2, fechaInicio, fechaTermino, insumos, comentarios, cantidad, valorUnitario, porcentaje, despacho) "
            . "VALUES (:empresa, :idCotizacion2, :fechaInicio, :fechaTermino, :insumos, :comentarios, :cantidad, :valorUnitario, :porcentaje, :despacho)";
        $res = $gbd->prepare($sql);
        if ($res->execute(array(':empresa' => $empresa,
        ':idCotizacion2' => $idCotizacion2,
        ':fechaInicio' => $fechaInicio,
        ':fechaTermino' => $fechaTermino,
        ':insumos' => $insumos,
        ':comentarios' => $comentarios,
        ':cantidad' => $cantidad,
        ':valorUnitario' => $valorUnitario,
        ':porcentaje' => $porcentaje,
        ':despacho' => $despacho
        ))
        ) {
            return true;
        }
        else {
            return false;
        }
    /* }else{
     return false;
     }  */
    }

    function existeNombre($nombreCompleto)
    {
        global $gbd;
        $sql = "SELECT * FROM cliente WHERE nombre='" . $nombreCompleto . "' ";
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            if ($row['idCliente'] > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    function eliminar($idCotizacion)
    {
        global $gbd;
        $sql = "DELETE FROM cotizaciones WHERE idCotizacion = :idCotizacion";
        $res = $gbd->prepare($sql);
        if ($res->execute(array(':idCotizacion' => $idCotizacion))) {
            return true;
        }
        else {
            return false;
        }
    }

    function obtenerCotizacionPorId($idCotizacion)
    {
        global $gbd;
        $sql = "SELECT * FROM cotizaciones WHERE idCotizacion=" . $idCotizacion;
        $res = $gbd->query($sql);

        if ($res) {
            $row = $res->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            return false;
        }
    }

    function modificar($idCotizacion, $empresa, $idCotizacion2, $fechaInicio, $fechaTermino, $insumos, $comentarios, $cantidad, $valorUnitario, $porcentaje, $despacho, $valorVenta, $total, $valorGanancia)
    {
        global $gbd;
        $data = array();

        $sql = "UPDATE cotizaciones SET empresa = :empresa, idCotizacion2 = :idCotizacion2, fechaInicio = :fechaInicio, fechaTermino = :fechaTermino, insumos = :insumos, comentarios = :comentarios, cantidad = :cantidad, valorUnitario = :valorUnitario, porcentaje = :porcentaje, despacho = :despacho, valorVenta = :valorVenta, total = :total, valorGanancia = :valorGanancia WHERE idCotizacion = :idCotizacion";

        $data = [
            ':idCotizacion' => $idCotizacion,
            ':empresa' => $empresa,
            ':idCotizacion2' => $idCotizacion2,
            ':fechaInicio' => $fechaInicio,
            ':fechaTermino' => $fechaTermino,
            ':insumos' => $insumos,
            ':comentarios' => $comentarios,
            ':cantidad' => $cantidad,
            ':valorUnitario' => $valorUnitario,
            ':porcentaje' => $porcentaje,
            ':despacho' => $despacho,
            ':valorVenta' => $valorVenta,
            ':total' => $total,
            ':valorGanancia' => $valorGanancia,
        ];

        $res = $gbd->prepare($sql);

        return $res->execute($data);

    }

}
