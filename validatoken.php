<?php
session_start();
?>

<?php
$host_db='169.254.16.202:8889';
$user_db='bdavid';
$pass_db='1234';
$db_name='personal';
$tbl_name='sesion';

$conexion= new mysqli($host_db,$user_db,$pass_db,$db_name);
if ($conexion->connect_error){
    die('La coneccion ha fallado: '.$conexion->connect_error);
}

$username=$_POST['username'];
$password=$_POST['password'];


$sql="select * from $tbl_name where idusuario='$username'";

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

    echo "Bienvenido: ".$_SESSION['username'];
    echo "<br><br><a href='index.php'>ABARROTERA HIDALGO</a>";
}else{
    echo "USUARIO O CONTRASEÑA INCORRECTOS";
    echo "<br><a href='login.html'>Volver a intentarlo</a> ";
}
mysqli_close($conexion);
?>