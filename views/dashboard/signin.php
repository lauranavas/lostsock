<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Registrarse', 'Registrarse')
?>
<!-- Formulario de inicio de sesión -->
<form method="post" id="signin-form">
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
            <label for="clave1">Nueva contraseña</label>
            <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Nueva contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
        </div>
        <div class="form-group col-md-6">
            <label for="clave2">Repetir contraseña</label>
            <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
        </div>
    </div>
    <button type="submit" class="btn btn-purple btn-block mt-2">Registrarse</button>
</form>
<?php
Page::footerSignIn('signin.js');
?>

