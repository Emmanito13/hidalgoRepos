<div class="modal fade" id="modalDocumentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:rgb(50, 141, 168); color:#FFF">
                <h5 class="modal-title" id="exampleModalLabel">Documentos presentados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="fw-bold container-header py-2" style="text-align:center; color: black;">
                    <h2 style="font-size: 20px;">Selecciona los documentos que tenga el empleado:</h2>
                </div>
                <div class="container-section">
                    <form action="#" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="row justify-content-between">
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkEmpleo" id="checkEmpleo">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Solicitud de empleo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkCurp" id="checkCurp">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        CURP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkDomicilio" id="checkDomicilio">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Comprobante de domicilio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkANP" id="checkANP">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Carta de antecedentes no penales
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkCarta1" id="checkCarta1">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Carta de recomendación 1
                                    </label>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkActa" id="checkActa">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Acta de nacimiento
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkElector" id="checkElector">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Credencial del elector
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkEstudios" id="checkEstudios">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Comprobante de estudios
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkImss" id="checkImss">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        No. de afiliación al IMSS
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="checkCarta2" id="checkCarta2">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Carta de recomendación 2
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" alt="submit" 0 class="btn btn-info" style="background:rgb(50, 141, 168); color:#FFF; margin-top: 3rem;" data-bs-dismiss="modal" id="guardaDoc">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#guardaDoc').click(function() {
            guardaDoc();
        });
    });
</script>