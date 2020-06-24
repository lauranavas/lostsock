<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Suscripciones', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Suscripciones</h3>
        <!-- Grupo de dropdowns -->
        <div class="d-flex flex-row my-2 my-md-0">
    </div>
    </div>
</div>
<table id="suscripcion-table" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Tipo de producto</th>
            <th>Talla</th>
            <th>Frecuencia</th>
            <th>Cliente</th>
            <th>Información de envío</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
    </tbody>
</table>
<div class="modal fade" id="suscripcion-modal" tabindex="-1" role="dialog" aria-labelledby="suscripcion-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="suscripcion-form" enctype="">
                <div class="modal-body p-md-4">
                    <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                    <input class="d-none" type="text" id="idsuscripcion" name="idsuscripcion" />
                    <!-- <p class="text-secondary">INFORMACIÓN PERSONAL</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres</label>
                            <input readonly type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input readonly type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos">
                        </div>
                    </div>
                    <!-- <p class="text-secondary">INFORMACIÓN DE ENVÍO</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="direccion">Dirección de envío</label>
                            <input readonly type="direccion" class="form-control" placeholder="Dirección de envío" id="detalledireccion" name="detalledireccion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="departamento">Departamento</label>
                            <input readonly type="text" class="form-control" placeholder="Departamento" id="detalledepartamentoo" name="detalledepartamento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="frecuencia">Frecuencia</label>
                            <input readonly type="text" class="form-control" placeholder="Frecuencia" id="frecuencia" name="frecuencia">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="costoenvio">Costo de envío</label>
                            <input readonly type="text" class="form-control" placeholder="Costo de envío" id="costoenvio" name="costoenvio">
                        </div>
                    </div>
                    <!-- <p class="text-secondary">INFORMACIÓN DEL PLAN DE SUSCRIPCIÓN</p> -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tipoproducto">Tipo de producto</label>
                            <input readonly type="text" class="form-control" placeholder="Tipo de producto" id="tipoproducto" name="tipoproducto">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categoria">Categoría</label>
                            <input readonly type="text" class="form-control" placeholder="Categoría" id="categoria" name="categoria">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>
                            <input readonly type="text"class="form-control" id="estado" name="estado"></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="talla">Talla</label>
                            <input readonly type="text" class="form-control" placeholder="Talla" id="talla" name="talla">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cantidad">Cantidad</label>
                            <input readonly type="text" class="form-control" placeholder="Cantidad" id="cantidad" name="cantidad">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="precio">Precio del producto</label>
                            <input readonly type="text" class="form-control" placeholder="Precio ($)" id="precio" name="precio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="total">Total a pagar</label>
                            <input readonly type="text" class="form-control" placeholder="Total ($)" id="total" name="total">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-purple">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
Page::footerTemplate('suscripcion.js');
?>
