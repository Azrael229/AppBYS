<?php 

$usuario = $_POST['usuario'];
$pass =  $_POST['pass'];    

// print_r ($usuario);
// print_r ($pass);


require ("conexion.php");


$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$pass'";

$resultado = mysqli_query($conexion,$sql);

//  foreach ($resultado as $row)
//    echo $row['ID'];


$filas = mysqli_num_rows($resultado);
if ($filas > 0){
    // echo ($usuario);
    // echo ("datos correctos");
    session_start();
    $_SESSION['usuario'] = $usuario;
    header("Location:index.php");

}else{
        // echo ("no hay datos ");
    header("Location:login.php");
}
 
mysqli_free_result($resultado);
mysqli_close($conexion);


  


?>