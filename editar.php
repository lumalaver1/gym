<?php

require "./conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylosA.css">
    <title>GYM</title>
</head>
<body>
<?php
        if(isset($_POST['enviar'])){
            $id = $_POST['id'];
            $nom_producto = $_POST['nom_producto'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            

            $sql = "UPDATE productos SET nom_producto='" . $nom_producto . "', categoria='" . $categoria .
             "', descripcion='" . $descripcion . "'
            , precio='" . $precio . "' WHERE id='" . $id . "'";



            $resultado=mysqli_query($conectar,$sql);

            if($resultado){
                echo '<script>alert("Se actualizaron los datos correctamente");
                location.assign("consultar.php");
                </script>';
            }else{
            echo '<script>alert("Error al conectarse a la BD");</script>';
            }
            mysqli_close($conectar);
        
         }else{

            $id = $_GET['id'];

            $sql = "SELECT * FROM productos WHERE id='".$id."'";
            $resultado= mysqli_query($conectar,$sql);

            $fila = mysqli_fetch_assoc($resultado);
            $nom_producto = $fila['nom_producto'];
            $categoria = $fila['categoria'];
            $descripcion = $fila['descripcion'];
            $precio = $fila['precio'];
            mysqli_close($conectar);
        }

    ?>
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid text-center">
        <a class="navbar-brand" href="#">GYMDEPORT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultar.php">CONSULTAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultar.php">EDITAR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./img/1.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./img/3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <h2>EDITAR PRODUCTOS</h2>
    <label for="nom_producto">Nombre del producto:</label>
    <input type="text" name="nom_producto" value="<?php echo $nom_producto; ?>">
    <label for="categoria">Categoría:</label>
    <select class="form-select" id="categoria" name="categoria" required>
        <option selected disabled value="" aria-required="true"></option>
        <option value="proteina" <?php if ($categoria === "proteina") echo 'selected'; ?>>proteina</option>
        <option value="suplementos" <?php if ($categoria === "suplementos") echo 'selected'; ?>>suplementos</option>
        <option value="accesorios" <?php if ($categoria === "accesorios") echo 'selected'; ?>>accesorios</option>
        <option value="bebidas" <?php if ($categoria === "bebidas") echo 'selected'; ?>>bebidas</option>
    </select>
    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" value="<?php echo $descripcion; ?>">
    <label for="precio">Precio:</label>
    <input type="number" name="precio" value="<?php echo $precio; ?>">

    <input type="submit" name="enviar" class="btn btn-outline-danger" value="ACTUALIZAR">
</form>



</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>