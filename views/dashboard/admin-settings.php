<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Configuración', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Ajustes de la cuenta</h3>
    </div>
</div>
<div class="row">
    <!-- Lista de opciones -->
    <div class="col-md-4">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="home">Editar perfil</a>
            <a class="list-group-item list-group-item-action" id="list-password-list" data-toggle="list" href="#list-password" role="tab" aria-controls="profile">Cambiar contraseña</a>
        </div>
    </div>
    <!-- Pestañas a las que acceden las opciones -->
    <div class="col-md-8 bg-light py-5 px-4 list-group-item">
        <div class="tab-content" id="nav-tabContent">
        <!-- Pestaña de cambiar perfil -->
        <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <h4 class="mb-4">Información general</h4>
            <form method="post" id="profile-form">
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
                <button type="submit" class="btn btn-purple mt-2">Actualizar</button>
            </form>
        </div>
        <!-- Pestaña de cambiar contraseña -->
        <div class="tab-pane fade" id="list-password" role="tabpanel" aria-labelledby="list-password-list">
            <h4 class="mb-4">Cambiar contraseña</h4>
            <form method="post" id="password-form">           
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clave">Contraseña actual</label>
                        <input type="password" class="form-control" id="clave" name="claveactual" placeholder="Contraseña actual" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clave1">Nueva contraseña</label>
                        <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Nueva contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="clave2">Repetir contraseña</label>
                        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                    </div>
                </div>
                <button type="submit" class="btn btn-purple mt-2">Actualizar</button>
            </form>
        </div>
        </div>
    </div>
</div>
<?php
Page::footerTemplate(null);
?>

