<?php
    require_once("BBDD.php");
    if(!empty($_GET['id'])){
        $id = htmlspecialchars(trim($_GET['id']));
    }
    header("Content-type: image/jpng");
    $conn = new poke();

    $img = $conn->getImage($id);

    if(empty($img)){
        $imagenPorDefecto = '../assets/img/logo.png';
        echo $imagenPorDefecto;
    } else {
        echo $img;
    }
?>