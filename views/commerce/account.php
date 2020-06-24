<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
            <!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid jumbotron-cover cover-general bg--light-blue">
        </div>
        <div class="container cover--account">
            <div class="row">
                <div class="col-12 col-md-5 border mr-5 bg-white py-4 mb-sm-4 mb-md-0">
                    <div class="row d-flex justify-content-center">
                        <div class="sm-12 md-2 lg-2 columns">
                            <div class="circle position-relative mb-3 mx-auto">
                                <!-- Imagen de perfil del usuario -->
                                <img class="profile--pic d-flex justify-content rounded-circle mx-auto" src="../../resources/img/user.png">
                                <div class="image-upload p-image">
                                    <label for="file-input">
                                        <i class="fad fa-camera-alt camera--button"></i>
                                    </label>
                                    <input id="file-input" class="file-upload" type="file" accept="image/*" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="p-3">
                        <h6 class="my-3 text-muted">INFORMACIÓN PERSONAL</h6>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputSurame" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputNumber" placeholder="Teléfono">
                        </div>
                        <h6 class="my-3 text-muted">INFORMACIÓN DE LA CUENTA</h6>
                        <div class="form-group mt-4">
                            <input type="text" class="form-control" id="exampleInputUser" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Contraseña">
                        </div>
                        <div class="form-group mb-5">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmar contraseña">
                        </div>
                        <button type="submit" class="btn custom--button text-white d-flex justify-content-center mx-auto">Actualizar</button>
                    </form>
                </div>
                <div class="col-12 col-md-6 border bg-white py-4">
                    <form class="p-3">
                        <h6 class="my-3 text-muted">INFORMACIÓN DE ENVÍO</h6>
                        <!-- Input de direccion-->
                        <div class="form-group my-4 ">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 1">
                        </div>
                        <!-- Input de departamento-->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 2">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 3">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <!-- Input de direccion -->
                        <div class="form-group my-4">
                            <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección 4">
                        </div>
                        <!-- Input de departamento -->
                        <label for="inputCity" class="text-secondary">Departamento</label>
                        <select id="inputCity" class="form-control col-9 col-sm-7 col-md-6 mb-5">
                            <option selected>San Salvador</option>
                            <option selected>San Miguel</option>
                        </select>
                        <button type="submit" class="btn custom--button text-white d-flex justify-content-center mx-auto">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
<?php
Page::footerTemplate();
?>