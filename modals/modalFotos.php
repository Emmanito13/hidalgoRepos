<div class="modal fade" id="modalFotos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(50, 141, 168); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Fotos del empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container py-4">
                    <form action="#" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img src="" name="imgFrente" id="imgFrente" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-center">FRENTE</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Cambiar imagen:</label>
                                            <input class="form-control" type="file" name="fotoFrente" id="fotoFrente" accept="image/png, image/jpeg">
                                            <input type="hidden" name="rutaFrente" id="rutaFrente">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card" style="width: 18rem;">
                                    <img src="" name="imgPerfil" id="imgPerfil" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-center">PERFIL</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Cambiar imagen:</label>
                                            <input class="form-control" type="file" name="fotoPerfil" id="fotoPerfil" accept="image/png, image/jpeg">
                                            <input type="hidden" name="rutaPerfil" id="rutaPerfil">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="" name="imgINE" id="imgINE" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title text-center">CREDENCIAL DE ELECTOR</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Cambiar imagen:</label>
                                            <input class="form-control" type="file" name="fotoINE" id="fotoINE" accept="image/png, image/jpeg">
                                            <input type="hidden" name="rutaINE" id="rutaINE">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" alt="submit" 0 class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin-top: 3rem;" data-bs-dismiss="modal" id="guardarFotos">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        function preview(input,foto) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    foto.prop("src", e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#fotoFrente').change(function() {
            preview(this,$('#imgFrente'));
        });

        $('#fotoPerfil').change(function() {
            preview(this,$('#imgPerfil'));
        });

        $('#fotoINE').change(function() {
            preview(this,$('#imgINE'));
        });

        $('#guardarFotos').click(function() {

            id = $('#id').val();
            if ($('#fotoFrente')[0].files[0] == null) {
                fotoFrente = '';
            } else {
                fotoFrente = $('#fotoFrente')[0].files[0];
            }

            if ($('#fotoPerfil')[0].files[0] == null) {
                fotoPerfil = '';
            } else {
                fotoPerfil = $('#fotoPerfil')[0].files[0];
            }

            if ($('#fotoINE')[0].files[0] == null) {
                fotoINE = '';
            } else {
                fotoINE = $('#fotoINE')[0].files[0];
            }

            rutaF = $('#rutaFrente').val();
            rutaP = $('#rutaPerfil').val();
            rutaI = $('#rutaINE').val();
            agregarFotos(id, fotoFrente, fotoPerfil, fotoINE, rutaF, rutaP, rutaI);
        });
    });
</script>