<?php
session_start();
$_SESSION['band'] = 'true';
?>

<?php
$host_db='localhost';
$user_db='root';
$pass_db='';
$db_name='rhhidalgo';
$tbl_name='sesion';


$conexion= new mysqli($host_db,$user_db,$pass_db,$db_name);
if ($conexion->connect_error){
    die('La coneccion ha fallado: '.$conexion->connect_error);
}

// require_once 'conexion.php';

// $conexion = conexion();

$username=$_POST['username'];
$password=$_POST['password'];


$sql = "select * from $tbl_name where idusuario='$username'";

$result=$conexion->query($sql);

if($result->num_rows > 0){
}

$row=$result->fetch_array(MYSQLI_ASSOC);

echo password_verify($password,$row['pass']);

if ($password==$row['pass']){

    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    $_SESSION['start']=time();
    $_SESSION['expire']=$_SESSION['start']+(5*60);

    header('location:indexMenu.php');
}else{
    session_unset();
    $_SESSION['band'] = 'false';
    header('location:index.php');
}
mysqli_close($conexion);
?>