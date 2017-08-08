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
    <title>Colored Card | Bootstrap Based Admin Template - Material Design</title>
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
    <link rel="stylesheet" type="text/css" href="js/easyui.css">
    <link rel="stylesheet" type="text/css" href="js/icon.css">
    <script type="text/javascript" src="js/pages/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <style type="text/css">



    </style>
    <script>
        var data = {"total":0,"rows":[]};
        var enviar = {};
        var totalCost = 0;

        $(function(){
            $('#cartcontent').datagrid({
                singleSelect:true
            });
            $('.item').draggable({
                revert:true,
                proxy:'clone',
                onStartDrag:function(){
                    $(this).draggable('options').cursor = 'not-allowed';
                    $(this).draggable('proxy').css('z-index',10);
                },
                onStopDrag:function(){
                    $(this).draggable('options').cursor='move';
                }
            });
            $('.cart').droppable({
                onDragEnter:function(e,source){
                    $(source).draggable('options').cursor='auto';
                },
                onDragLeave:function(e,source){
                    $(source).draggable('options').cursor='not-allowed';
                },
                onDrop:function(e,source){
                    var name = $(source).find('p:eq(0)').html();
                    var price = $(source).find('p:eq(1)').html();
                    var lol = $(source).find('p:eq(2)').html();
                    var pro = $(source).find('p:eq(3)').html();
                    addProduct(name, price,lol,pro);
                    $.ajax({
                        method: "POST",
                        url: "../Modelo/horariio.php?p=view",
                        data: {
                            name: name,
                            price: price,
                            lol: lol,
                            pro: pro,
                        }
                    })
                    .done(function (data) {
                        console.log("Resultado: "+ name);
                    })
                }
            });
        });

        function addProduct(name,price,lol,pro){

            function add(){

                if (data.total!=5) {
                    for (var i = 0; i < data.total; i++) {
                        var row = data.rows[i];
                        if (row.name == name) {


                            var allowDismiss = true;
                            var llll = "center";
                            var placementFrom = "bottom";
                            var placementAlign = "center";
                            var animateEnter = "animated fadeInUp";
                            var animateExit = "animated fadeOutUp";
                            $.notify({
                                title: '<strong>Esta Asignatura</strong>',
                                message: "Ya esta en tu Lista"
                            }, {

                                type: "info",
                                allow_dismiss: allowDismiss,
                                newest_on_top: true,
                                timer: 1000,
                                placement: {
                                    from: placementFrom,
                                    align: placementAlign
                                },
                                animate: {
                                    enter: animateEnter,
                                    exit: animateExit
                                }
                            });

                            return;
                        }
                    }

                    data.total += 1;
                    data.rows.push({
                        name: name,
                        quantity: lol,
                        price: price,
                        profesores: pro
                });


                }

                else {

                    var allowDismiss = true;
                    var llll = "center";
                    var placementFrom = "bottom";
                    var placementAlign = "center";
                    var animateEnter = "animated fadeInUp";
                    var animateExit = "animated fadeOutUp";
                    $.notify({
                        title: '<strong>Solo puedes</strong>',
                        message: "Inscribir 5 Asignaturas"
                    }, {

                        type: "warning",
                        allow_dismiss: allowDismiss,
                        newest_on_top: true,
                        timer: 1000,
                        placement: {
                            from: placementFrom,
                            align: placementAlign
                        },
                        animate: {
                            enter: animateEnter,
                            exit: animateExit
                        }
                    });
                }

            }

            add();

            $('#cartcontent').datagrid('loadData', data);
        }
    </script>
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
        <div class="row clearfix">
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
                        <div>

                        <?php
                        $query_offers = 'SELECT *
                        FROM asignatura,prueba WHERE asignatura.description = prueba.idP';
                        $offers = mysql_query($query_offers, $conexion);

                        while ($row = mysql_fetch_array($offers)) {
                            ?>

                            <div  class="item" style="width: 100%">
                                <div class="card">
                                    <div class="header bg-blue-grey">
                                        <h2>
                                            <p><?php echo $row['name']; ?></p>
                                        </h2>

                                    </div>
                                    <div class="body" >
                                        <p><?php echo $row['H_Inicio']; ?></p>
                                        <p ><?php echo $row['H_Final']; ?> </p>
                                        <p ><?php echo $row['Nombre']; ?> <?php echo $row['Apellido']; ?> </p>
                                    </div>
                                </div>

                            </div>

                            <?php
                        }
                        ?>
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
                            <style>
                                .datagrid-header-row, .datagrid-row {
                                    height: 65px;
                                }
                            </style>
                            <table id="cartcontent" fitColumns="true" style="height: 430px; width: 100% border: 0px none">
                                <thead>
                                <tr>
                                    <th field="name">Nombre</th>
                                    <th field="profesores">Profesor</th>
                                    <th field="price">Inicia</th>
                                    <th field="quantity">Finaliza</th>
                                    <th field="quantity">Dias</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
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