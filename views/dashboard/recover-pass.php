<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Restablecer contraseña','Restablece tu contraseña')
?>
<!-- Formulario para recuperar contraseña -->
<p>Ingresa una nueva contraseña segura. Tu contraseña debe tener como mínimo 8 caracteres: Una minúscula, una máyuscula, un número y un signo especial.</p>
<form method="post" id="recoverpass-form">
    <div class="form-group">
        <label for="clave1">Nueva contraseña</label>
        <input type="password" class="form-control" id="clave1" placeholder="Nueva contraseña" name="clave1">
    </div>
    <div class="form-group">
        <label for="clave2">Repetir contraseña</label>
        <input type="password" class="form-control" id="clave2" placeholder="Repetir contraseña" name="clave2">
    </div>
    <a class="btn btn-outline-purple btn-block" href="index.php" role="button">Cancelar</a>
    <button type="submit" class="btn btn-purple btn-block mt-2">Restablecer</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

