<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>

<div class="container-fluid  cover-general">
        <h1 class="general-title">Cesta de compra</h1>
        <div class="row mx-0 my-2">
            <div class="col-sm-7 mx-0">
                <main class="cart-left mx-5">
                    <!-- Carrito -->
                    <section class="cart-left">
                        <div class="text-center mb-0">
                            <div class="card card-cart">
                                <img src="../../resources/img/socks.jpg" alt="" class="cart-image">
                            </div>
                        </div>
                    </section>
                    <section class="cart-left">
                        <div class="text-center mb-0">
                            <div class="card card-cart">
                                <img src="../../resources/img/socks.jpg" alt="" class="cart-image">
                            </div>
                        </div>
                    </section>
                    <section class="cart-left">
                        <div class="text-center mb-0">
                            <div class="card card-cart">
                                <img src="../../resources/img/socks.jpg" alt="" class="cart-image">
                            </div>
                        </div>
                    </section>
                    <section class="cart-left">
                        <div class="text-center mb-2">
                            <div class="card card-cart">
                                <img src="../../resources/img/socks.jpg" alt="" class="cart-image">
                            </div>
                        </div>
                    </section>
                </main>
            </div>
            <div class="col mx-0">
                <main class="cart-right mx-5">
                    <!-- Carrito -->
                    <section class="cart-right">
                        <div class="text-center mb-2">
                            <div class="card card-cart card-cart-description">
                                <div class="text-center mb-5 mt-5">
                                    <h1>Procesar compra</h1>
                                    <div class="text-left mb-2 mt-5 mx-5 d-flex justify-content-between">
                                        <h3>Subtotal:</h3>
                                        <h3>$15</h3>
                                    </div>
                                    <div class="text-left mb-5s mt-5 mx-5 d-flex justify-content-between">
                                        <h3>Envío:</h3>
                                        <h3>$2.5</h3>
                                    </div>
                                    <hr class="hr-cart">
                                    <div class="text-left mb-2 mt-5 mx-5 d-flex justify-content-between">
                                        <h3>Total:</h3>
                                        <h3>$17.5</h3>
                                    </div>
                                    <div class="text-center mb-2 mt-5 mx-5">
                                        <button type="button"
                                            class="btn btn-procesar-compra">Procesar compra</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        <div class="col mx-5 mt-5">
            <h2>DATOS PERSONALES</h2>
            <form class="form-inline">
                <div class="form-group mb-2">
                    <input type="text" readonly class="form-control-plaintext col-3" id="staticName" value="Ana Laura">
                    <input type="text" readonly class="form-control-plaintext col-3" id="staticSurname"
                        value="Navas Cañas">
                    <input type="text" readonly class="form-control-plaintext col-3" id="staticEmail"
                        value="lauranavasv@gmail.com">
                    <input type="text" readonly class="form-control-plaintext col-3" id="staticPhoneNumber"
                        value="7957 0450">
                </div>
            </form>
        </div>
        <div class="col mx-5 mt-5">
            <h2>INFORMACIÓN DE ENVÍO</h2>
            <form class="form-inline">
                <small>Direccion:</small>
                <div class="form-group mb-2 mx-3">
                    <select class="form-control">
                        <option>Final Autopista Norte y Quinta Avenida Norte, Condominios "Quinta Avenida", apartamento
                            10B3</option>
                        <option>Final Autopista Norte y Quinta Avenida Norte, Condominios "Quinta Avenida", apartamento
                            10B3</option>
                        <option>Final Autopista Norte y Quinta Avenida Norte, Condominios "Quinta Avenida", apartamento
                            10B3</option>
                        <option>Final Autopista Norte y Quinta Avenida Norte, Condominios "Quinta Avenida", apartamento
                            10B3</option>
                    </select>
                </div>
            </form>
            <form class="form-inline mt-5">
                <small>Departamento:</small>
                <div class="form-group mb-2 mx-3">
                    <select class="form-control">
                        <option>San Salvador</option>
                        <option>Chalatenango</option>
                        <option>La Libertad</option>
                        <option>Cuscatlán</option>
                    </select>
                </div>
            </form>
        </div>

<?php
Page::footerTemplate();
?>