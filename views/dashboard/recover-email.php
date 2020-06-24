<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Recuperar contraseña','Necesitamos comprobar tu identidad')
?>
<p>Ingresa tu correo electrónico asociado a tu cuenta. Te enviaremos un código para restablecer tu contraseña.</p>
<form method="post" id="login-form" class="mb-4">
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
    </div>
    <a class="btn btn-outline-purple btn-block" href="index.php" role="button">Cancelar</a>
    <button type="submit" class="btn btn-purple btn-block">Enviar código</button>
</form>
<?php
Page::footerSignIn('recoverpass.js');
?>

