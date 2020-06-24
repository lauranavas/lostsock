<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Recuperar contraseña','Necesitamos comprobar tu identidad')
?>
<p>Ingresa el código que recibiste en tu correo electrónico para poder restablecer tu contraseña.</p>
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="codigo">Código de recuperación</label>
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de recuperación">
    </div>
    <a class="btn btn-outline-purple btn-block" href="recover-email.php" role="button">Volver atrás</a>
    <button type="submit" class="btn btn-purple btn-block">Verificar código</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

