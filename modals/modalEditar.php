<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(50, 141, 168); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del empleado</h5>
                <button id="cerrar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="fw-bold container-header py-2" style="text-align:center; color: black;">
                        <h1 style="font-size: 30px;">Datos personales:</h1>
                    </div>
                    <div class="container-section">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <input type="hidden" name="id" id="id">
                                <center>
                                    <label>Nombre(s):<span>*</span></label>
                                </center>
                                <input style="text-transform:uppercase" type="text" name="nombre" id="nombre" class="form-control input-sm" required>

                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Apellidos:<span>*</span></label>
                                </center>
                                <input style="text-transform:uppercase" type="text" name="apellidos" id="apellidos" class="form-control input-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Fecha de nacimiento:<span>*</span></label>
                                </center>
                                <input type="date" name="fechaN" id="fechaN" class="form-control input-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Sexo:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="radioM" value="M">
                                    <label class="form-check-label" for="radioM">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="radioF" value="F">
                                    <label class="form-check-label" for="radioF">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Direccion:</label>
                                </center>
                                <input style="width: 350px; height: auto ;" type="textarea" name="direccion" id="direccion" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <center>
                                    <label>CURP:</label>
                                </center>
                                <input style="text-transform:uppercase" type="text" name="curp" id="curp" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Numero telefonico:</label>
                                </center>
                                <input type="text" name="numeroT" id="numeroT" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Correo electronico:</label>
                                </center>
                                <input type="email" name="correo" id="correo" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>RFC:</label>
                                </center>
                                <input style="text-transform:uppercase" type="text" name="rfc" id="rfc" class="form-control input-sm">
                            </div>
                        </div>
                    </div>
                    <div class="fw-bold container-header py-2" style="text-align:center; color: black;">
                        <h1 style="font-size: 30px;">Datos del IMSS:</h1>
                    </div>
                    <div class="container-section">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <center>
                                    <label>Fecha de alta en el IMSS:</label>
                                </center>
                                <input type="date" name="fechaAImss" id="fechaAImss" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>No. de lista IMSS:</label>
                                </center>
                                <input type="number" name="numeroLImss" id="numeroLImss" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Numero IMSS:</label>
                                </center>
                                <input type="text" name="numeroImss" id="numeroImss" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Sueldo de IMSS:</label>
                                </center>
                                <input type="number" name="sueldoLImss" id="sueldoLImss" class="form-control input-sm">
                            </div>
                        </div>
                    </div>

                    <div class="fw-bold container-header py-2" style="text-align:center; color: black;">
                        <h1 style="font-size: 30px;">Datos para la empresa:</h1>
                    </div>
                    <div class="container-section">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <center>
                                    <label><input type="image" src="pictures/suge.png" width="15px" onclick="numDefault()">&nbspNo. de empleado:<span>*</span></label>
                                </center>
                                <input type="number" name="numEmpleado" id="numEmpleado" class="form-control input-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Sueldo:<span>*</span></label>
                                </center>
                                <input type="number" name="sueldo" id="sueldo" class="form-control input-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                require_once '../conexion.php';
                                $conexion = conexion();
                                $selectTurno = "SELECT * FROM turno";
                                $result = mysqli_query($conexion, $selectTurno);
                                ?>
                                <center>
                                    <label>Turno:<span>*</span></label>
                                </center>
                                <select class="form-select" aria-label="Default select example" id="turno" name="turno" required>
                                    <option selected>Elige un turno</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?php echo $row['idTurno']; ?>"><?php echo $row['horario']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <label>Fecha de ingreso Abarrotera:<span>*</span></label>
                                </center>
                                <input type="date" name="fechaIAbarrotera" id="fechaIAbarrotera" class="form-control input-sm" required>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $selectContrato = "SELECT * FROM contrato";
                                $resultContrato = mysqli_query($conexion, $selectContrato);
                                ?>
                                <center>
                                    <label>Contrato:<span>*</span></label>
                                </center>
                                <select id="contrato" name="contrato" class="form-select" aria-label="Default select example" required>
                                    <option selected>Elige un contrato</option>
                                    <?php
                                    while ($row2 = mysqli_fetch_array($resultContrato)) {
                                    ?>
                                        <option value="<?php echo $row2['idContrato']; ?>"><?php echo $row2['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <?php
                                $selectEmpresa = "SELECT * FROM empresa";
                                $resultEmpresa = mysqli_query($conexion, $selectEmpresa);
                                ?>
                                <center>
                                    <label>Empresa:<span>*</span></label>
                                </center>
                                <select id="empresa" name="empresa" class="form-select" aria-label="Default select example" required>
                                    <option selected>Elige una empresa</option>
                                    <?php
                                    while ($row3 = mysqli_fetch_array($resultEmpresa)) {
                                    ?>
                                        <option value="<?php echo $row3['idEmpresa']; ?>"><?php echo $row3['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <?php
                                $selectDepa = "SELECT * FROM departamento";
                                $resultDepa = mysqli_query($conexion, $selectDepa);
                                ?>
                                <center>
                                    <label>Departamento:<span>*</span></label>
                                </center>
                                <select id="departamento" name="departamento" class="form-select" aria-label="Default select example" required>
                                    <option selected>Elige un departamento</option>
                                    <?php
                                    while ($row4 = mysqli_fetch_array($resultDepa)) {
                                    ?>
                                        <option value="<?php echo $row4['idDepa']; ?>"><?php echo $row4['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <?php
                                $selectPuesto = "SELECT * FROM puesto";
                                $resultPuesto = mysqli_query($conexion, $selectPuesto);
                                ?>
                                <center>
                                    <label>Puesto:<span>*</span></label>
                                </center>
                                <select id="puesto" name="puesto" class="form-select" aria-label="Default select example" required>
                                    <option selected>Elige un puesto</option>
                                    <?php
                                    while ($row5 = mysqli_fetch_array($resultPuesto)) {
                                    ?>
                                        <option value="<?php echo $row5['idPuesto']; ?>"><?php echo $row5['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <?php
                                $selectJefe = "SELECT * FROM jefe";
                                $resultJefe = mysqli_query($conexion, $selectJefe);
                                ?>
                                <center>
                                    <label>Jefe inmediato:</label>
                                </center>
                                <select id="jefe" name="jefe" class="form-select" aria-label="Default select example">
                                    <option selected>Elige un jefe</option>
                                    <?php
                                    while ($row6 = mysqli_fetch_array($resultJefe)) {
                                    ?>
                                        <option value="<?php echo $row6['idJefe']; ?>"><?php echo $row6['nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input hidden type="text" name="band" id="band" value="" required>
                        </div>
                        </form>
                    </div>

                    <div class="fw-bold container-header py-2" style="text-align:center; color: black;">
                        <h1 style="font-size: 30px;">Observaciones:</h1>
                    </div>

                    <div class="container-section">
                        <form action="#" method="post">
                            <div class="row justify-content-center py-1">
                                <input style="width: 400px; height: auto ;" type="textarea" name="observaciones" id="observaciones" class="form-control input-sm">
                            </div>
                        </form>
                    </div>
                    <p><span>*</span>Campos obligatorios</p>
                </div>
                <div class="modal-footer">
                    <button type="button" alt="submit" class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin-top: 3rem;" data-bs-dismiss="modal" id="editarEmpleado">Guardar</button>
                </div>

            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#editarEmpleado').click(function() {
            if ($('#nombre').val() == '' || $('#apellidos').val() == '' || $('#fechaN').val() == '' || $('#numEmpleado').val() == '' ||
                $('#sueldo').val() == '' || $('#turno').val() == 'Elige un turno' || $('#fechaIAbarrotera').val() == '' || $('#contrato').val() == 'Elige un contrato' ||
                $('#empresa').val() == 'Elige una empresa' || $('#departamento').val() == 'Elige un departamento' || $('#puesto').val() == 'Elige un puesto' ||
                $('#jefe').val() == 'Elige un jefe' || $('#band').val() == 'rojo') {
                //                    alert(document.querySelector('input[name="genero"]:checked').value);
                alert('Campos vacios, verifica los campos obligatorios');
            } else {
                actualizaDatos();
            }
        });

        $('#cerrar').click(function(){
            window.location = "archivo.php";
        });

        const Nlista = document.getElementById('numEmpleado');
        Nlista.onchange = function() {
            var cadena = "Nlista=" + Nlista.value;
            $.ajax({
                type: "POST",
                url: "verificaNlista.php",
                data: cadena,
                success: function(r) {
                    if (r == 'si') {
                        $('#numEmpleado').css('border-color', 'rgb(247, 32, 32)');
                        alertify.error("El numero de lista ya existe, cambielo o genere uno nuevo por default");
                        $('#band').val('rojo');
                    } else {
                        $('#numEmpleado').css('border-color', 'rgb(84, 247, 52)');
                        $('#band').val('verde');
                    }
                }
            });
        }
    });
</script>