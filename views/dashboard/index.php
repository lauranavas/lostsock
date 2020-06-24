<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Iniciar sesión', 'Iniciar sesión')
?>
<!-- Formulario de inicio de sesión -->
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico" title="Solo se permiten direcciones de correo válidas">
    </div>
    <div class="form-group">
        <label for="clave">Contraseña</label>
        <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña"  pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
    </div>
    <button type="submit" class="btn btn-purple btn-block">Iniciar sesión</button>
</form>
<a href="recover-email.php">¿Has olvidado tu contraseña?</a>
<?php
Page::footerSignIn('index.js');
?>

