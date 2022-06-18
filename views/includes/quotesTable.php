<table id="tablaCotizaciones" class="display" style="width:100%">
    <thead>
        <tr>
            <th style="padding-left: 5px;">ID</th>
            <th style="padding-left: 5px;">Empresa</th>
            <th style="padding-left: 5px;">ID Cotizacion</th>
            <th style="padding-left: 5px;">Fecha inicio</th>
            <th style="padding-left: 5px;">Fecha termino</th>
            <th style="padding-left: 5px;">Insumos</th>
            <!--   <th style="padding-left: 5px;">Comentarios</th>       -->
            <!--   <th style="padding-left: 5px;">Fecha en que se oferto</th>    -->
            <th style="padding-left: 5px;">Cantidad</th>
            <th style="padding-left: 5px;">Valor unitario</th>
            <th style="padding-left: 5px;">Valor venta</th>
            <th style="padding-left: 5px;">Porcentaje</th>
            <th style="padding-left: 5px;">Despacho</th>
            <th style="padding-left: 5px;">Total</th>
            <th style="padding-left: 5px;">Valor ganancia</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value) : ?>
        <tr>
            <td style='padding-left: 5px;'><?=$value['idCotizacion']?></td>
            <td style='padding-left: 5px;'><?=$value['empresa']?></td>
            <td style='padding-left: 5px;'><?=$value['idCotizacion2']?></td>
            <td style='padding-left: 5px;'><?=$value['fechaInicio']?></td>
            <td style='padding-left: 5px;'><?=$value['fechaTermino']?></td>
            <td style='padding-left: 5px;'><?=$value['insumos']?></td>
            <td style='padding-left: 5px;'><?=$value['cantidad']?></td>
            <td style='padding-left: 5px;'><?=$value['valorUnitario']?></td>
            <td style='padding-left: 5px;'><?=$value['valorVenta']?></td>
            <td style='padding-left: 5px;'><?=$value['porcentaje']?></td>
            <td style='padding-left: 5px;'><?=$value['despacho']?></td>
            <td style='padding-left: 5px;'><?=$value['total']?></td>
            <td style='padding-left: 5px;'><?=$value['valorGanancia']?></td>
            <td style='padding-left: 5px;'>
                <a href='#' class='modificar' id='<?=$value['idCotizacion']?>'>
                    <img src='assets/img/edit.ico' width='40'>
                </a>
            </td>
            <td style='padding-left: 5px;'>
                <a href='../controller/cotizacion.php?accion=eliminar&idCotizacion=<?=$value['idCotizacion']?>'>
                    <img src='assets/img/delete.png' width='40'>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>