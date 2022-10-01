<div class="modal fade" id="modalEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(208,101,3); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Nueva empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post">
                        <div class="row justify-content-center">
                            <center>
                                <label>Ingresa una nueva empresa:</label>
                            </center>
                            <input type="text" name="empresaNuevo" id="empresaNuevo" class="form-control input-sm">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" alt="submit" 0 class="btn btn-info" style="background:rgb(208,101,3); color:#FFF; margin: 1px" data-bs-dismiss="modal" id="guardarEmpresa">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#guardarEmpresa').click(function() {

            if ($('#empresaNuevo').val() == '') {                
                alert('Campo vacio, ingrese una nueva empresa');
            } else {
                agregaEmpresa($('#empresaNuevo').val());
            }

        });
    });
</script>