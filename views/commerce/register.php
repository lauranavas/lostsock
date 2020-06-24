<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Regístrarse | Lost Sock');
?>
<div class="container-fluid">
    <div class="row justify-content-center my-auto">        
        <div class="col-xl-10 col-lg-12 col-md-9 login--container">
            <div class="card o-hidden border-0 shadow-lg mt-4">
                <div class="card-body mt-5">
                    <div class="row">
                        <!--div que contiene la imagen que desaparece -->
                        <div class="col-lg-6 d-none d-lg-block login--image"></div>
                        <!-- Div de la derecha -->
                        <div class="col-lg-6 p-5">
                            <div class="d-flex flex-column justify-content-center my-auto">
                                <h3 class="mb-4 mx-auto">Regístrate</h3>
                                <form method="post" id="signin-form" class="p-4">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" placeholder="Nombres" id="nombres" name="nombres" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                                        <div class="invalid-feedback">Solo se permiten letras</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidos" pattern="^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,25}$" title="Solo se permiten letras">
                                        <div class="invalid-feedback">Solo se permiten letras</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono" pattern="^[2,6,7]{1}[0-9]{3}[-][0-9]{4}$" title="Solo se permite número tenga el formato 0000-0000 y que inicie con 2, 6 o 7">
                                        <div class="valid-feedback">Número de teléfono válido</div>
                                        <div class="invalid-feedback">Número con formato 0000-0000 e inicie con 2, 6 o 7</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="email" title="Solo se permiten direcciones de correo válidas">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" pattern="^[a-z0-9_-]{3,15}$" title="Solo se permiten letras, y los caracteres - y _">
                                        <div class="valid-feedback">Nombre de usuario válido</div>
                                        <div class="invalid-feedback">Solo se permiten letras, y los caracteres - y _</div>
                                    </div>  
                                    <div class="form-group">
                                        <label for="clave1">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="clave1" name="clave1" placeholder="Nueva contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                                        <div class="valid-feedback">Contraseña segura</div>
                                        <div class="invalid-feedback">Mínimo 8 caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="clave2">Repetir contraseña</label>
                                        <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Repetir contraseña" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Mínimo ocho caracteres, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="condiciones">
                                            <label class="custom-control-label" for="condiciones"> <a href="conditions.php">He leído y acepto los <span class="text-purple">términos y condiciones</span></a></label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn custom--button float-none w-100 mt-3">Registrarse</button>
                                </form>
                                <a class="mx-auto mt-4" href="login.php"><small>¿Ya tienes una cuenta?  <span class="text-purple">Inicia sesión aquí.</span></small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
<?php
Page::footerTemplate();
?>

