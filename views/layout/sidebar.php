<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="index.php">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i>
                    <span>Cotizaciones</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="crudcotizaciones.php">CRUD Cotizaciones</a></li>
                    <li><a class="" href="cotizaciones.php">Consultar Cotizaciones</a></li>
                </ul>
            </li>
            <?php if ($perfil == 'Administrador'): ?>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i>
                    <span>Usuarios</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="usuarios.php">CRUD Usuarios</a></li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</aside>