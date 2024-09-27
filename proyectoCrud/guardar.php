
<?php
include ('db.php');

if(isset($_POST['save_tarea'])){
    $nombre = $_POST ['nombre'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tarea (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    $result = mysqli_query($conn,$query);

    if(!$result) {
        die("Query Failed");
    }
    $_SESSION['message'] = 'Tarea enviada correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location:  index.php");
}

?> 