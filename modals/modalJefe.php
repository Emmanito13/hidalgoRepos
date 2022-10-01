<div class="modal fade" id="modalJefe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(208,101,3); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo jefe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="#" method="post">
                        <div class="row justify-content-center">
                            <center>
                                <label>Ingresa un nuevo jefe:</label>
                            </center>
                            <input type="text" name="jefeNuevo" id="jefeNuevo" class="form-control input-sm">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" alt="submit" 0 class="btn btn-info" style="background:rgb(208,101,3); color:#FFF; margin: 1px" data-bs-dismiss="modal" id="guardarJefe">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#guardarJefe').click(function() {

            if ($('#jefeNuevo').val() == '') {                
                alert('Campo vacio, ingrese un nuevo jefe');
            } else {
                agregaJefe($('#jefeNuevo').val());
            }

        });
    });
</script>