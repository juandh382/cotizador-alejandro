
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
                        class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">SISTEMA <span class="lite">COTIZACIONES</span></a>
            <div class="col-md-2" style="left: 10px;margin-top: 8px;">
                <h4>Bienvenido <?php echo $user; ?></h4>
            </div>
            <button type="button" class="btn btn-primary" style="margin-left: 980px;margin-top: 12px;"><a
                    href="../Controlador/cerrarSesion.php?<?php echo SID; ?>" style="color: white;">Cerrar
                    Sesión</a></button>
            <!--logo end-->
        </header>
        <!--header end-->