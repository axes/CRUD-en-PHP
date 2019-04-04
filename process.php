<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', 'password', 'crud') or die (mysqli_error($mysqli));
   
    // Configurar variables
    $ID = 0;
    // Limpiar variables
    $nombres = '';
    $apellidos = '';
    $nacimiento = '';
    $email = '';
    $telefono = '';
    // variable para cambiar estado del botón de 'Guardar' a 'Actualizar'
    $actualizar = false;


    // Guardar datos
    if(isset($_POST['guardar'])){
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $nacimiento = $_POST['nacimiento'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $mysqli->query("INSERT INTO data (nombres, apellidos, nacimiento, email, telefono) VALUES('$nombres', '$apellidos', '$nacimiento','$email','$telefono')") or die($mysqli->error());

        $_SESSION['message'] = "Registro ha sido guardado!";
        $_SESSION['msg_type'] = "success";
        header("location: index.php");
    }

    // Eliminar datos
    if(isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];

        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

        $_SESSION['message'] = "Registro ha sido eliminado!";
        $_SESSION['msg_type'] = "danger";
        header("location: index.php");
    }

    // Editar datos
    if(isset($_GET['editar'])){
        $ID = $_GET['editar'];

        // variable para cambiar estado del botón de 'Guardar' a 'Actualizar'
        $actualizar = true;

        $result = $mysqli->query("SELECT * FROM data WHERE ID=$ID") or die($mysqli->error());
        if (count($result)==1){
            $row            = $result->fetch_array();

            $nombres        = $row['nombres'];
            $apellidos      = $row['apellidos'];
            $nacimiento     = $row['nacimiento'];
            $email          = $row['email'];
            $telefono       = $row['telefono'];
        }
    }
    
    // Actualizar Datos
    if(isset($_POST['actualizar'])){
        $ID             = $_POST['ID'];
        $nombres        = $_POST['nombres'];
        $apellidos      = $_POST['apellidos'];
        $nacimiento     = $_POST['nacimiento'];
        $email          = $_POST['email'];
        $telefono       = $_POST['telefono'];

        $mysqli->query("UPDATE data SET nombres='$nombres', apellidos='$apellidos', nacimiento='$nacimiento', email='$email', telefono='$telefono' WHERE ID=$ID") or die($mysqli->error);
        
        $_SESSION['message'] = "Registro ha sido actualizado! en ID:".$ID;
        $_SESSION['msg_type'] = "warning";
        header("location: index.php");
    }
?>