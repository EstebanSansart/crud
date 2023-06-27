<?php

    include_once "templates/header.php";

?>

<?php

    include_once "model/conexion.php";
    $sentencia = $bd -> query("SELECT * FROM persona");
    $persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    // print_r($persona);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- inicio alerta -->

            <?php
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR!</strong> Rellena todos los campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado!</strong> Se agregaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Editado!</strong> Se actualizaron los datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Se eliminaron los datos del usuario seleccionado.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signo</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                    foreach($persona as $dato){
                                
                                ?>
                                <tr class="">
                                    <td scope="row"><?php echo $dato -> codigo; ?></td>
                                    <td><?php echo $dato -> nombre; ?></td>
                                    <td><?php echo $dato -> edad; ?></td>
                                    <td><?php echo $dato -> signo; ?></td>
                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $dato -> codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estás seguro de eliminar los datos del usuario?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato -> codigo; ?>"><i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                                <?php
                                
                                    }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad</label>
                        <input type="number" class="form-control" name="txtEdad" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo</label>
                        <input type="text" class="form-control" name="txtSigno" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    include_once "templates/footer.php";

?>