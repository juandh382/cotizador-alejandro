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
        <?php foreach ($data as $value) : ?>
        <tr>
            <td style='padding-left: 5px;'><?=$value['idUsuario']?></td>
            <td style='padding-left: 5px;'><?=$value['nombre']?></td>
            <td style='padding-left: 5px;'><?=$value['pwd']?></td>
            <td style='padding-left: 5px;'><?=$value['perfil']?></td>
            <td style='padding-left: 5px;'>
                <a href='#' class='modificar' id='<?=$value['idUsuario']?>'>
                    <img src='<?=base_url?>/views/assets/img/edit.ico' width='40'>
                </a>
            </td>
            <td style='padding-left: 5px;'>
                <a href='<?=base_url?>?controller=User&action=index&accion=eliminar&idUsuario=<?=$value['idUsuario']?>'>
                    <img src='<?=base_url?>/views/assets/img/delete.png' width='40'>
                </a>
            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>