<?php

$id=$_GET['id'];
require "./conexion.php";

$sql="delete from productos WHERE id='".$id."'";
$resultado=mysqli_query($conectar,$sql);

if($resultado){
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("consultar.php");
    </script>';
}else{
echo '<script>alert("Error al eliminar los datos");
location.assign("consultar.php");
</script>';
}
mysqli_close($conectar);

?>