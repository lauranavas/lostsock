<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
    <div class="container-fluid">
            <div class="row justify-content-center my-auto">        
                <div class="col-xl-10 col-lg-12 col-md-9 login--container">
                    <div class="card o-hidden border-0 shadow-lg mt-5 mb-n5">
                        <div class="card-body mt-5">
                            <div class="row mt-5">
                            <!--div que contiene la imagen que desaparece -->
                            <div class="col-lg-6 d-none d-lg-block login--image mb-5"></div>
                            <div class="col-lg-6">
                            <div class="p-5 my-auto">
                                <div class="text-center">
                                    <h1 class="h4 text-blue mb-4">Iniciar sesión</h1>
                                </div>
                                <form class="my-5">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" placeholder="Correo electronico">
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="InputPassword" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">  
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Recordar usuario</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary custom--button float-none" href="dashboard.php">Iniciar sesión</button>
                                </div>
                                </form>
                                <div class="text-center mt-3">
                                    <a class="" href=""><small>¿Olvidaste tu contraseña?  <span class="text-purple">Recupérala aquí.</span></small></a>
                                </div>
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

