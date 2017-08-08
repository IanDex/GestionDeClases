<?php
session_start();

if (empty($_SESSION['idP'])){
    header("Location: login.php");
}else?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="css/materialize.css">
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <title>Table Quick Edit</title>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <style>
        .table.user-select-none {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
</head>
<body onload="viewData()" class="theme-light-blue">
<!-- Page Loader -->
<?php if(!empty($_GET['respuesta'])){ ?>
    <?php if ($_GET['respuesta'] == "1"){ ?>
        <script>
            var allowDismiss = true;
            var llll = "center";
            var placementFrom = "top";
            var placementAlign = "left";
            var animateEnter = "animated fadeInLeft";
            var animateExit = "animated fadeOutLeft";
            $.notify({
                title: '<strong>Ciclo</strong>',
                message: "Registrado Con Exito"},{

                type: "success",
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit:animateExit
                }
            });

        </script>
    <?php   ?>
    <?php }else{?>
        <script>
            var allowDismiss = true;
            var llll = "center";
            var placementFrom = "top";
            var placementAlign = "left";
            var animateEnter = "animated fadeInLeft";
            var animateExit = "animated fadeOutLeft";
            $.notify({
                title: '<strong>Se Produjo un</strong>',
                message: "Error Inesperado"},{

                type: "danger",
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 1000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit:animateExit
                }
            });

        </script>
    <?php } ?>
<?php } ?>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<?php require ("snippers/MenuTop.php")?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php require ("snippers/MenuLeft.php")?>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php require ("snippers/MenuRight.php")?>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">

            <div class="row">
                <div class="col-md-12">
                    <div style="background: white; padding: 15px; border-radius: 10px">
                        <h3>Estudiantes Registrados</h3>

                        <table id="mytable" class="table table-bordered table-striped">
                            <caption>

                            </caption>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Telefono</th>
                                <th>Correo</th>





                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <form class="col s12" method="post" action="../Controlador/CicloCtlr.php?action=crear">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Registrar Ciclo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="nom" type="text" class="form-control" placeholder="Nombre del Ciclo" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="nivel" type="text" class="form-control" placeholder="Nivel" required/>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancelar</button>
                        <button type="submit" style="color: blue;" class="btn btn-link waves-effect">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.tabledit.min.js"></script>
<script src="js/jquery.form.js"></script>
<script>
    function viewData(){
        $.ajax({
            url: '../Modelo/vprofe.php?p=viewl',
            method: 'GET'
        }).done(function(datas){
            $('tbody').html(datas)
            tableData()
        })
    }
    function tableData(){
        $('#mytable').Tabledit({
            url: '../Modelo/vprofe.php',
            eventType: 'click', //dblclick
            editButton: true,
            deleteButton: true,
            hideIdentifier: false,
            saveButton: true,
            autoFocus: true,
            restoreButton: true,
            rowIdentifier: 'id',
            buttons: {
                edit: {
                    class: 'btn btn-sm btn-warning',
                    html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-sm btn-danger',
                    html: '<span class="glyphicon glyphicon-trash"></span> &nbsp',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Guardar'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: '<span class="fa fa-undo"></span> Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-default',
                    html: 'Estas Seguro?' //Confirm btn-danger

                },
                ian: {

                }
            },
            columns: {
                identifier: [0, 'id'],
                editable: [[1, 'name'],[2, 'gender'],[3, 'doc'],[4, 'tel'],[5, 'email']]
            },
            onSuccess: function(data, textStatus, jqXHR) {
                viewData()
            },
            onFail: function(jqXHR, textStatus, errorThrown) {
                console.log('onFail(jqXHR, textStatus, errorThrown)');
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            },
            onAjax: function(action, serialize) {
                console.log('onAjax(action, serialize)');
                console.log(action);
                console.log(serialize);
            }
        });
    }
</script>




<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/ui/modals.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>