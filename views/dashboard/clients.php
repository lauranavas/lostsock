<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Clientes', null);
?>

<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-row align-items-center">
        <h3 class="mr-md-3">Clientes</h3>
    </div>
<table id="cliente-table" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
    </tbody>
</table>
<div class="modal fade" id="cliente-modal" tabindex="-1" role="dialog" aria-labelledby="cliente-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-md-4">
                <table id="suscripciones-table" class="table table-responsive-sm table-hover">
                    <thead>
                        <tr>
                            <th>Categoría</th>
                            <th>Tipo de producto</th>
                            <th>Talla</th>
                            <th>Frecuencia</th>
                            <th>Plan</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-suscripcion-rows" class="table-bordered">
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-purple">Guardar</button>
            </div>
        </div>
    </div>
</div>

<?php
Page::footerTemplate('cliente.js');
?>

