<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de colores', null);
?>
<div class="d-flex flex-row align-items-center flex-wrap mb-4">
    <div class="d-flex flex-row align-items-center">
        <h3 class="mr-md-3">Colores</h3>
    </div>
    <div class="d-flex flex-row align-items-center ml-md-auto">
        <!-- Boton para llamar modal de agregar color -->
        <button type="button" class="btn btn-purple mx-2" data-toggle="modal" onclick="openCreateModal()">
            Agregar
        </button>
    </div>
    <!-- Modal agregar color -->
    <div class="modal fade" id="color-modal" tabindex="-1" role="dialog" aria-labelledby="color-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="color-form" enctype="">
                    <div class="modal-body p-md-6">
                        <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                        <input class="d-none" type="text" id="idcolor" name="idcolor" />
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="color">Ingresa el nombre del color</label>
                                <input type="text" class="form-control" placeholder="Color" id="color" name="color" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,20}" required>
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
</div>
    <div class="row">
        <div class="col-md-12">
            <table id="color-table" class="table table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="pl-4">Color</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows" class="table-bordered">
                </tbody>
            </table>
        </div>
    </div>
</div>    
<?php
Page::footerTemplate('color.js');
?>

