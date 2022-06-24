
<table id="tablaAbogados" class="display" style="width:100%">
    <thead>
        <tr>
            <th style="padding-left: 5px;">Id</th>
            <th style="padding-left: 5px;">Usuario</th>
            <th style="padding-left: 5px;">Fecha</th>
            <th style="padding-left: 5px;">Hora</th>
            <th style="padding-left: 5px;">Descripcion</th>
            <th style="padding-left: 5px;">Archivo</th>
            <th style="padding-left: 5px;">Tipo</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $value) {
                echo "<tr>";
                echo "<td style='padding-left: 5px;'>" . $value['id'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['name'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['fecha'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['hora'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['description'] . "</td>";
                echo "<td style='padding-left: 5px;'><a href='".base_url."/views/archive.php?id=" . $value['id'] . "' target='_blank'>" . $value['ruta'] . "</a></td>";
                echo "<td style='padding-left: 5px;'>" . $value['tipo'] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
