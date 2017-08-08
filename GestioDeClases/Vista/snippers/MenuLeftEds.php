<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo $_SESSION['foto'];?>" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name'] .' '. $_SESSION['app']?></div>
            <div class="email"><?php echo $_SESSION['email'];?></div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="pages/logout.php"><i class="material-icons">person</i>Perfil</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="yavuelvo.php"><i class="material-icons">sentiment_neutral</i>Ya Vuelvo</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="pages/logout.php"><i class="material-icons">input</i>Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu de Navegacion</li>
            <li >
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">wc</i>
                    <span>Horario</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="Profe.php">Ver</a>
                    </li>
                    <li>
                        <a href="horario.php">Inscribir Materias</a>
                    </li>
                </ul>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span>Profesores</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="Profe.php">Ver</a>
                    </li>

                </ul>
            <li >
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Notas</span>
                </a>
            </li>
            <li >
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span>Asignaturas Pendientes</span>
                </a>
            </li>



        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">

        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>