<?php 
include('db.php');

if(isset($_GET['id'])){
    $id =$_GET['id'];

    $query = "SELECT * FROM tarea WHERE id= $id";
    $result= mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
       $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
    }
}
    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tarea set nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
        mysqli_query($conn, $query);
        header('Location: index.php');
    }

?>

<?php include('includes/header.php'); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card car-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group m-3">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                            class="form-control" placeholder="Actualiza el nombre">
                        </div>
                        <div class="form-group m-3">
                            <textarea  name="descripcion" rows="2" class="form-control"
                            placeholder="Actualiza el nombre"><?php echo $descripcion; ?></textarea>
                        </div>
                        <button class="btn btn-success m-3" name="actualizar">
                        Actualizar
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/footer.php');?>