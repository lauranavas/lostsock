<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>

 <div class="container-fluid cover-general">
            <div class="row mx-auto">
                <div class="col-md-5">
                    <main class="configuracion-left">
                        <!-- Configuración, parte izquierda -->
                        <section class="conf-left mx-auto col-9">
                            <form class="conf-form border border-light">
                                <div class="row d-flex justify-content-center">
                                    <div class="sm-12 md-2 lg-2 columns">
                                        <div class="circle position-relative mb-3 mx-auto">
                                            <!-- Imagen de perfil del usuario -->
                                            <img class="profile-pic-account rounded-circle mx-auto"
                                                src="../../resources/img/user.jpg">
                                            <!-- Imagen por default -->
                                            <div class="p-image">
                                                <i class="fa fa-camera upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-5">INFORMACIÓN PERSONAL</h4>
                                <div class="form-group">
                                    <label for="exampleInputName">Nombres</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        placeholder="Nombres">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSurame">Apellidos</label>
                                    <input type="text" class="form-control" id="exampleInputSurame"
                                        placeholder="Apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNumber">Teléfono</label>
                                    <input type="text" class="form-control" id="exampleInputNumber"
                                        placeholder="Teléfono">
                                </div>
                                <h4 class="mt-5">INFORMACIÓN DE LA CUENTA</h4>
                                <div class="form-group">
                                    <label for="exampleInputUser">Usuario</label>
                                    <input type="text" class="form-control" id="exampleInputUser"
                                        placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Correo</label>
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Correo">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Contraseña</label>
                                    <input type="password" class="form-control" id="exampleInputPassword"
                                        placeholder="Contraseña">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="exampleInputPassword1">Confirmar contraseña</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Confirmar contraseña">
                                </div>
                                <button type="submit" class="btn btn-actualizar">Actualizar</button>
                            </form>
                        </section>
                    </main>
                </div>
                <!-- Parte de -->
                <div class="col">
                    <main class="configuracion-right">
                        <!-- Configuración, parte derecha -->
                        <section class="conf-right">
                            <form class="conf-form-2  border border-light">
                                <h4 class="my-5">GESTIONAR DIRECCIONES</h4>
                                <!-- Input de direccion-->
                                <div class="form-group my-4 ">
                                    <label for="inputDireccion">Direccion 1</label>
                                    <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección">
                                </div>
                                <!-- Input de departamento-->
                                <label for="inputCity">Departamento</label>
                                <select id="inputCity" class="form-control col-5">
                                    <option selected>San Salvador</option>
                                    <option selected>San Miguel</option>
                                    <option selected>Santa Ana</option>
                                    <option selected>Cuscatlán</option>
                                    <option selected>La Libertad</option>
                                    <option selected>Chalatenango</option>
                                    <option selected>Ahuachapán</option>
                                    <option selected>La Paz</option>
                                    <option selected>La Unión</option>
                                    <option selected>Morazán</option>
                                    <option selected>San Vicente</option>
                                    <option selected>Sonsonate</option>
                                    <option selected>Usulután</option>
                                    <option selected>Cabañas</option>
                                </select>
                                <!-- Input de direccion -->
                                <div class="form-group my-4">
                                    <label for="inputDireccion">Direccion 2</label>
                                    <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección">
                                </div>
                                <!-- Input de departamento -->
                                <label for="inputCity">Departamento</label>
                                <select id="inputCity" class="form-control col-5">
                                    <option selected>San Salvador</option>
                                    <option selected>San Miguel</option>
                                    <option selected>Santa Ana</option>
                                    <option selected>Cuscatlán</option>
                                    <option selected>La Libertad</option>
                                    <option selected>Chalatenango</option>
                                    <option selected>Ahuachapán</option>
                                    <option selected>La Paz</option>
                                    <option selected>La Unión</option>
                                    <option selected>Morazán</option>
                                    <option selected>San Vicente</option>
                                    <option selected>Sonsonate</option>
                                    <option selected>Usulután</option>
                                    <option selected>Cabañas</option>
                                </select>
                                <!-- Input de direccion -->
                                <div class="form-group my-4">
                                    <label for="inputDireccion">Direccion 3</label>
                                    <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección">
                                </div>
                                <!-- Input de departamento -->
                                <label for="inputCity">Departamento</label>
                                <select id="inputCity" class="form-control col-5">
                                    <option selected>San Salvador</option>
                                    <option selected>San Miguel</option>
                                    <option selected>Santa Ana</option>
                                    <option selected>Cuscatlán</option>
                                    <option selected>La Libertad</option>
                                    <option selected>Chalatenango</option>
                                    <option selected>Ahuachapán</option>
                                    <option selected>La Paz</option>
                                    <option selected>La Unión</option>
                                    <option selected>Morazán</option>
                                    <option selected>San Vicente</option>
                                    <option selected>Sonsonate</option>
                                    <option selected>Usulután</option>
                                    <option selected>Cabañas</option>
                                </select>
                                <!-- Input de direccion -->
                                <div class="form-group my-4">
                                    <label for="inputDireccion">Direccion 4</label>
                                    <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección">
                                </div>
                                <!-- Input de departamento -->
                                <label for="inputCity">Departamento</label>
                                <select id="inputCity" class="form-control col-5">
                                    <option selected>San Salvador</option>
                                    <option selected>San Miguel</option>
                                    <option selected>Santa Ana</option>
                                    <option selected>Cuscatlán</option>
                                    <option selected>La Libertad</option>
                                    <option selected>Chalatenango</option>
                                    <option selected>Ahuachapán</option>
                                    <option selected>La Paz</option>
                                    <option selected>La Unión</option>
                                    <option selected>Morazán</option>
                                    <option selected>San Vicente</option>
                                    <option selected>Sonsonate</option>
                                    <option selected>Usulután</option>
                                    <option selected>Cabañas</option>
                                </select>
                                <!-- Botón de actualizar -->
                                <button type="submit" class="btn btn-actualizar mt-5">Actualizar</button>
                            </form>
                        </section>
                    </main>
                </div>
            </div>

<?php
Page::footerTemplate();
?>