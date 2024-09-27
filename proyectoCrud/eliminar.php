<?php 
include('db.php');


    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM tarea WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('Query Failed');
        }

        $_SESSION['message'] = 'Se elimino la tarea';
        $_SESSION ['message_type'] = 'danger';
        header('Location: index.php');
    }

?>