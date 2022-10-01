<div class="modal fade" id="modalVacaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(50, 141, 168); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Vacaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="idE" id="idE">
                <input type="text" name="nombreE" id="nombreE">
                <input type="text" name="apellidosE" id="apellidosE">
                <input type="text" name="nListaE" id="nListaE">
                <input type="text" name="fIngresoE" id="fIngresoE">
                <input type="text" name="sueldoE" id="sueldoE">
                <input type="text" name="suedoImss" id="suedoImss">
                <input type="text" name="depaE" id="depaE">
                <input type="text" name="diasV" id="diasV">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <table class="table">
                            <thead>
                                <tr align="center">
                                    <th align="center" scope="col">No. Dia</th>
                                    <th align="center" scope="col">Fecha</th>
                                    <th align="center" scope="col">Pago/Dia</th>
                                    <th align="center" scope="col">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idE;
                                require_once 'conexion.php';
                                $conexion = conexion();
                                $Consulta = "SELECT * FROM vacaciones,trabajo where vacaciones.idE = $idE AND trabajo.idE = 1904";
                                $Lista = mysqli_query($conexion, $Consulta);
                                while ($row = mysqli_fetch_array($Lista)) {
                                ?>
                                    <tr>
                                        <th class="text-center" scope="row"><?php echo $row['noDia']?></th>
                                        <td align="center"><input type="date" class="form-control input-sm" value="<?php echo $row['fechaDia']?>"></td>
                                        <td align="center"><?php echo $row['Sueldo']*0.25;?></td>
                                        
                                        <td align="center">
                                            <input type='image' src='pictures/pagado.png' alt='Submit' width='20' height='20'>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>                                
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <label class="fw-bold">Sueldo:<p id="lbl-sueldo" class="fw-normal">2500</p></label>
                        </div>
                        <div class="col-sm-4">
                            <label class="fw-bold">Prima vacacional:<p id="lbl-prima" class="fw-normal">200</p></label>
                        </div>
                        <div class="col-sm-4">
                            <label class="fw-bold">Sueldo total:<p id="lbl-sueldoT" class="fw-normal">2750</p></label>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <button type="button" alt="" 0 class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin: 1rem;" id="btn-Recibo">Generar recivo</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" alt="submit" 0 class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin: 1rem;" data-bs-dismiss="modal" id="guardaDoc">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //$('')
        // $('#guardaDoc').click(function() {
        //     guardaDoc();
        // });
        //document.getElementById("lbl-sueldo").textContent = document.getElementById('sueldoE').textContent;

    });
</script>