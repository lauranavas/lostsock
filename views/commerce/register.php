<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
    <div class="container-fluid">
            <div class="row justify-content-center my-auto">        
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg mt-4">
                        <div class="card-body mt-5">
                            <div class="row">
                            <!--div que contiene la imagen que desaparece -->
                            <div class="col-lg-6 d-none d-lg-block login--image mb-5"></div>
                            <div class="col-lg-6">
                            <div class="p-5 my-auto">
                                <div class="text-center">
                                    <h1 class="h4 text-blue mb-4">Regístrate</h1>
                                </div>
                                <form class="my-3">
                                <div class="form-group">
                                    <input type="name" class="form-control form-control-user" id="InputName" aria-describedby="emailHelp" placeholder="Nombres">
                                </div>
                                <div class="form-group">
                                    <input type="surname" class="form-control form-control-user" id="InputSurname" aria-describedby="emailHelp" placeholder="Apellidos">
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control form-control-user" id="InputPhone" aria-describedby="emailHelp" placeholder="Teléfono">
                                </div>
                                <div class="form-group">
                                    <input type="user" class="form-control form-control-user" id="InputUser" aria-describedby="emailHelp" placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" placeholder="Correo electronico">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="InputPassword" aria-describedby="emailHelp" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="InputPassword" placeholder="Confirmar contraseña">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck"> <a href="conditions.php">Acepto los términos y condiciones</a></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary custom--button float-none" href="dashboard.php">Registrarse</button>
                                </div>
                                </form>
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

