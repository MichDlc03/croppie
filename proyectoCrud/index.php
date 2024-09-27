
<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?>
                 alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } session_unset() ?>
            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group m-2">
                        <input type="text" name="nombre" class="form-control"
                        placeholder="Escribe tarea" autofocus>
                    </div>
                    <div class="form-group m-2">
                        <textarea name="descripcion"  rows="2" class="form-control" placeholder="Descripcion"></textarea></textarea></textarea>
                    </div>
                    <input type="submit" name="save_tarea" class="btn btn-primary btn-block m-2" >
                </form>

            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-boardered ">
                <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tarea";
                        $result_task = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_task)) { ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['creacion'] ?></td>
                                <td>
                                    <a class="btn btn-secondary m-2" href="editar.php?id=<?php echo $row['id'] ?>"> Editar</a>
                                    <a class="btn btn-danger m-2" href="eliminar.php?id=<?php echo $row['id'] ?>">Elimiar</a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
<?php include("includes/footer.php") ?>

