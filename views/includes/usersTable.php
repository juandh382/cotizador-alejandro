<table id="tablaUsuarios" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="padding-left: 5px;">Id</th>
            <th style="padding-left: 5px;">Nombre</th>
            <th style="padding-left: 5px;">Contraseña</th>
            <th style="padding-left: 5px;">Perfil</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $value) {
                echo "<tr>";
                echo "<td style='padding-left: 5px;'>" . $value['idUsuario'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['nombre'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['pwd'] . "</td>";
                echo "<td style='padding-left: 5px;'>" . $value['perfil'] . "</td>";
                echo "<td style='padding-left: 5px;'><a href='#' class='modificar' id='" . $value['idUsuario'] . "'><img src='assets/img/edit.ico' width='40'></a></td>";
                echo "<td style='padding-left: 5px;'><a href='../controllers/usuario.php?accion=eliminar&idUsuario=" . $value['idUsuario'] . "'><img src='assets/img/delete.png' width='40'></a></td>";
                echo "</tr>";
            }
            ?>
    </tbody>
</table>
                