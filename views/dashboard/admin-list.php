<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de administradores', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Administradores</h3>
        <!-- Botón agregar -->
        <button type="button" onclick="openCreateModal()" class="btn btn-purple ml-md-auto my-auto">
            Agregar
        </button>
    </div>
</div>
<table id="myTable" class="table table-responsive-sm table-hover">
    <thead>
        <tr>
            <th>Información general</th>
            <th>Usuario</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody-rows" class="table-bordered">
    </tbody>
</table>
<!-- Modal agregar usuario -->
<div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="save-modal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="post" id="save-form" enctype="">
        <div class="modal-body p-md-4">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input class="d-none" type="text" id="idadministrador" name="idadministrador"/>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'1','25'}$" title="Solo se permiten letras">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                </div>
                <div class="form-group col-md-6">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
                </div>   
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo_administrador">Tipo</label>
                    <select class="form-control" id="tipo_administrador" name="tipo_administrador">
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label id="lblE" for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                    </select>
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
Page::footerTemplate('administrador.js');
?>

