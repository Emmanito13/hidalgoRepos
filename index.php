<?php
session_start();
if(empty($_SESSION['band'])){
    $band = 'true';    
}else{
    $band = $_SESSION['band'];
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('lib/lib.php') ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <title>Login</title>
</head>

<body>
    
    <div class="container">
        <div class="row-mf-12 text-center login-page">
            <div class="col-md-12 login-form">
                <div class="col mt-2 text-center">
                    <img src="iconos/abarroteraH.png" width="85" alt="">
                </div>
                <form action="checklogin.php" method="post">
                    <div class="row">
                        <div class="col-md-12 login-form-header">
                            <p class="login-form-font-header">Abarrotera<span>&nbsp;Hidalgo</span>
                            <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-from-row">
                            <input name="username" type="text" placeholder="Usuario" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-from-row">
                            <input name="password" type="password" placeholder="Contraseña" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 login-from-row">
                            <button type="submit" class="btn btn-info">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    if('<?php echo $band; ?>' == 'false'){
        alertify.alert('Datos incorrectos','El usuario y/o contraseña estan incorrectos. Por favor vuelva a intentarlo');
        <?php session_unset();?>
        <?php session_destroy();?>
    }
</script>