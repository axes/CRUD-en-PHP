<!doctype html>
<html lang="es">
    <head>
        <title>Registro Usuarios</title>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- DataTables CSS-->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>

    <body>
        <div class="container py-5">
            <?php   // Funciones CRUD
                require_once 'process.php'; ?>

            <?php   // Avisos de alerta cuando se realizan ciertas acciones
                if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?=$_SESSION['msg_type'] ?> alert-dismissible fade show text-center" role="alert">
                    <?php 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php   // Query a la BD para mostrar tabla ***CAMBIAR UBICACION, NOMBRE, PASSWORD Y NOMBRE DE LA BASE DE DATOS***
                $mysqli = new mysqli('localhost', 'root', 'password', 'crud') or die (mysqli_error($mysqli));
                $resultado = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            ?>

            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table display responsive no-wrap"  id="tablaDT">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Editar/Borrar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row = $resultado->fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['nombres']; ?></td>
                                <td><?php echo $row['apellidos']; ?></td>
                                <td><?php echo $row['nacimiento']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td class="text-center">
                                    <a href="index.php?editar=<?php echo $row['ID']; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> 
                                    <a href="process.php?eliminar=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 
                                </td>
                            </tr>
                            <?php endwhile;?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6">
                    <form action="process.php" method="POST">
                        <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                        <div class="form-group">
                            <label for="">Nombres:</label>
                            <input class="form-control" type="text" name="nombres" value="<?php echo $nombres; ?>" placeholder="Ingresa Nombre">
                        </div>

                        <div class="form-group">
                            <label for="">Apellidos:</label>
                            <input class="form-control" type="text" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="Ingresa Apellidos">
                        </div>

                        <div class="form-group">
                            <label for="">Fecha de Nacimiento:</label>
                            <input class="form-control" type="text" name="nacimiento" value="<?php echo $nacimiento; ?>" placeholder="Ingresa Fecha de Nacimiento">
                        </div>

                        <div class="form-group">
                            <label for="">Email:</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" placeholder="Ingrese Email">
                        </div>

                        <div class="form-group">
                            <label for="">Teléfono:</label>
                            <input class="form-control" type="text" name="telefono" value="<?php echo $telefono; ?>" placeholder="Ingrese Teléfono">
                        </div>

                        <div class="form-group">
                            <?php if($actualizar == true): ?>
                            <button class="btn btn-primary " type="submit" name="actualizar"><i class="far fa-save"></i> Actualizar</button>
                            <?php else: ?>
                            <button class="btn btn-primary " type="submit" name="guardar"><i class="fas fa-save"></i> Guardar</button>
                            <?php endif; ?>    
                        </div>
                    </form>
                </div>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

            <!-- DataTables JS -->
            <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script src="js/dt.js"></script>
        </div>
    </body>
</html>