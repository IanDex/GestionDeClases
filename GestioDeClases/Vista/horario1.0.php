<?php
session_start();

if (empty($_SESSION['idP'])){
    header("Location: login.php");
}else
    $conexion = mysql_connect("localhost", "root", "");
mysql_select_db("bd_pro", $conexion);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>lllllard | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!--WaitMe Css-->

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fab.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <link rel="stylesheet" href="css/css/styler.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="css/css/redips-drag-min.js"></script>
    <script type="text/javascript" src="css/css/script.js"></script>

</head>

<body class="theme-red">
<!-- Page Loader -->
<?php require ("snippers/MenuTop.php")?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php require ("snippers/MenuLeftEds.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Example -->

        <div id="redips-drag">
            <div class="row clearfix">
            <!-- left container -->
                <div class=" col-md-4 col-sm-6 col-xs-12">
                    <div class="card" style="height: 550px">
                        <div class="header bg-light-blue">
                            <h2>
                                Listado de Asignaturas
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>

                                    <a>
                                        <i class="material-icons">search</i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="header bg-light-blue" hidden>
                            <input type="text" style="color: black">
                            <button class="right">Buscar</button>
                        </div>
                        <div class="body" style=" overflow: scroll; height: 490px;">
                            <div id="left-container">
                                <!-- this block will become sticky (with a little JavaScript help)-->
                                <div >
                                    <table id="table1">

                                <?php
                                $query_offers = 'SELECT *
                        FROM asignatura';
                                $offers = mysql_query($query_offers, $conexion);

                                while ($row = mysql_fetch_array($offers)) {
                                    ?>

                                        <tr>
                                            <td>
                                                <div id="<?php echo $row['idA']; ?>"class="redips-drag redips-clone"><?php echo $row['NombreA']; ?></div>
                                                <p><?php echo $row['N_min']; ?></p>



                                            </td>
                                        </tr>
                                    <?php
                                }
                                ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" >
                    <div class="card" style="height: 550px;">
                        <div class="header bg-light-blue">
                            <h2>
                                Arrastre <small>Las Materias a Inscribir</small>
                            </h2>

                        </div>
                        <div class="body">
                            <div class="cart">

                                    <table>

                                        <tr class="maintd">
                                            <td class="redips-trash">Drop here</td>
                                        </tr>
                                    </table>
                                    <div style="clear:both"/>
                                    <!-- list of dropeed elements -->
                                    <form id="myform">
                                        <ol id="drop-list">
                                        </ol>

                                        <input id="save-button" type="button" value="Save" class="button" onclick="redips.save()" title="Save form"/>
                                    </form>


                            </div>
                        </div>
                    </div>
                </div>


            <!-- right container -->
            </div>
        </div>

        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red" href="#modal1">
                <i class="large material-icons" data-toggle="tooltip" data-placement="left" title="Guardar Cambios">save</i>
            </a>
        </div>

        <!-- #END# Colored Card - With Loading -->
    </div>
</section>

<!-- Jquery Core Js -->

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Wait Me Plugin Js -->
<script src="plugins/waitme/waitMe.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/cards/colored.js"></script>
<script src="js/pages/ui/tooltips-popovers.js"></script>


<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>