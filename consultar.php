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
  include("./conexion.php");
  $sql = "SELECT * FROM productos";
  $resultado = mysqli_query($conectar, $sql);
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
                    <a class="nav-link" href="agregar.html">AGREGAR</a>
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

    
<table class="table table-striped" id="myTable">
<a type="button" class="btn btn-warning btn-md" href="agregar.html">Agregar</a>
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>categoria</th>
                      <th>Precio</th>
                      <th>Fecha de Salida</th>
                      <th class="hidden">Editar</th>
                      <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  while ($fila = mysqli_fetch_assoc($resultado)) {
                      echo "<tr>";
                      echo "<td>" . $fila['id'] . "</td>";
                      echo "<td>" . $fila['nom_producto'] . "</td>";
                      echo "<td>" . $fila['categoria'] . "</td>";
                      echo "<td>" . $fila['descripcion'] . "</td>";
                      echo "<td>" . $fila['precio'] . "</td>";
                      echo "<td><a class='btn btn-btn btn-outline-warning' href='editar.php?id=" . $fila['id'] . "'>Editar</a></td>";
                      echo "<td><a class='btn btn-outline-danger' href='eliminar.php?id=" . $fila['id'] . "' onclick='return confirmar()'>Eliminar</a></td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>