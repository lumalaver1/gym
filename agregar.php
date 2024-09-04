<?php
// Procesamiento de formulario al recibir los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "./conexion.php"; // Asegúrate de que este archivo contenga la conexión a la base de datos

    // Verificar la conexión
    if (!$conectar) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Recibiendo los datos del formulario
    $nom_producto = mysqli_real_escape_string($conectar, $_POST['nom_producto']);
    $categoria = mysqli_real_escape_string($conectar, $_POST['categoria']);
    $descripcion = mysqli_real_escape_string($conectar, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conectar, $_POST['precio']);
    $fecha_registro = date('Y-m-d H:i:s'); // Generando la fecha actual en el formato adecuado

    // Validando los datos (ejemplo simple)
    if(empty($nom_producto) || empty($categoria) || empty($precio)) {
        echo '<script>alert("Por favor, completa todos los campos obligatorios.");
        location.assign("agregar.php");
        </script>';
        exit();
    }

    // Formando la consulta SQL para insertar los datos en la tabla `productos`, incluyendo `fecha_registro`
    $insert = "INSERT INTO productos (nom_producto, categoria, descripcion, precio, fecha_registro) 
               VALUES ('$nom_producto', '$categoria', '$descripcion', $precio, '$fecha_registro')";

    // Ejecutando la consulta
    $query = mysqli_query($conectar, $insert);

    // Verificar el resultado de la consulta
    if ($query) {
        echo '<script>alert("Se almacenaron los datos correctamente");
        location.assign("consultar.php");
        </script>';
    } else {
        echo '<script>alert("Error al conectarse a la BD: ' . mysqli_error($conectar) . '");
        location.assign("agregar.php");
        </script>';
    }

    // Cerrar la conexión
    mysqli_close($conectar);
}
?>
