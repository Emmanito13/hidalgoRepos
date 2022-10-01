<!doctype html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Recuros humanos</title>
    <link rel="shortcut icon" href="pictures/logoAba.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="style/index_style.css"> -->
    <script src="scripts/funciones.js"></script>
    <?php include('lib/lib.php') ?>
    <link rel="stylesheet" href="css/style_index_menu.css">

</head>

<body BGCOLOR=#CCC>

    <div id="contenido">
        <div class="fw-bold container-header py-5" style="text-align:center; color: #203C6C;">
            <h1><input type="image" src="pictures/rh.png" width="2.5%" height="auto" tabindex="-1"> Recursos humanos</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class=" col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(208,101,3);">
                            <h4 style="font-size: auto;">Nuevo empleado</h4>
                        </div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalNuevo">
                            <img src="pictures/empleado+.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(233,147,26);">
                            <h4>Archivo Empleado</h4>
                        </div>
                        <a href="archivo.php">
                            <img src="pictures/archi.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(22,145,190);">
                            <h4>Buscar</h4>
                        </div>
                        <a href="busqueda.php">
                            <img src="pictures/buscar.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(22,107,162);">
                            <h4 font-size: auto;>Impresion de formatos</h4>
                        </div>
                        <a href="formatos.php">
                            <img src="pictures/formato.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(21,40,54);">
                            <h4>Bajas</h4>
                        </div>
                        <a href="formatosbaja.php">
                            <img src="pictures/baja.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header" id="ch-w" style="background: rgb(231, 50, 75);">
                            <h4>Cerrar sesión</h4>
                        </div>
                        <a href="logout.php">
                            <img src="pictures/salida.png" style="text-align: center;" width="110" height="auto">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'modals/modalNuevo.php'; ?>

</body>

</html>