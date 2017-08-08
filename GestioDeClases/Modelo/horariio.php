<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');
$page = isset($_GET['p'])? $_GET['p'] : '' ;
$pg = isset($_POST['bcr'])? $_POST['bcr'] : '' ;

if($page=='view'){
    $res = 2;

    $resultl = $mysqli->query("SELECT * FROM ciclos");
while ($row = $result->fetch_assoc()) {
    if (<?php echo $row["NombreC"] ?>)
    ?>
            if ($row['Nombre']!=$a){
                $res=0;
 }
<?php
    }

    if ($res==0) {


        $a = $_POST['name'];
        $ar = $_POST['price'];
        $arr = $_POST['lol'];
        $arra = $_POST['pro'];
        $result = $mysqli->query("INSERT INTO bd_pro.ciclos VALUES (null,'" . $a . "','" . $ar . "','" . $arr . "')");
    }


}
?>