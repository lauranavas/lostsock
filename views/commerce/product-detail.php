<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
    <?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Hombres');
?>
        <!-- Grupo de cards para productos -->
        <div class="container cover-general">
            <!-- row -->
            <div class="row">
                <div class="col-12 col-md-6 mr-5 py-4 mb-sm-4 mb-md-0 mt-5">
                    
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-75 h-75 d-block justify-content-center mx-auto" src="../../resources/img/socks2.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-75 h-75 d-block justify-content-center mx-auto" src="../../resources/img/socks2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-75 h-75 d-block justify-content-center mx-auto" src="../../resources/img/socks2.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                </div>
                <div class="col-12 col-md-5 py-4 mt-5">
                    <!-- Detalles de los productos -->
                    <div class="col-12">
                        <h3 class="mb-2 text-purple">$10</h3>
                        <h2 class="mb-2">Banana Socks</h2>
                        <div class="rating mb-2">
                            <div>
                                <span class="fa fa-star text-yellow"></span>
                                <span class="fa fa-star text-yellow"></span>
                                <span class="fa fa-star text-yellow"></span>
                                <span class="fa fa-star text-yellow"></span>
                                <span class="fa fa-star text-yellow"></span>
                            </div>
                        </div>
                        <!-- Descripción de producto -->
                        <p class="text-muted mb-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Fuga quis voluptate eius labore sit tempore,
                            in minus ullam iusto ipsum nemo officia aperiam laboriosam rerum fugit facilis rem beatae
                            at.</p>
                        <!-- Colores -->
                        <div class="mb-3">
                            <span class="dot bg--purple"></span>
                            <span class="dot bg--light-blue"></span>
                            <span class="dot bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                        </div>
                        <div class="input-group mb-5">
                            <div class="dropdown">
                                <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Talla
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">S</a>
                                    <a class="dropdown-item" href="#">M</a>
                                    <a class="dropdown-item" href="#">L</a>
                                </div>
                            </div>
                            <div class="col-3 text-center">
                                <input class="form-control form-control-sm" type="number">
                            </div>
                        </div>
                        <!-- Botón de añadir a la cesta -->
                        <div class="action-button mb-5">
                            <button class="btn text-white custom--button" type="button">Añadir a la cesta</button>
                        </div>
                        <!-- Descripción detallada del producto -->
                        <div>
                            <h6><small class="text-secondary">Categoría: Hombres</small></h6>
                            <h6><small class="text-secondary">Tipo: Calcetines</small></h6>
                            <h6><small class="text-secondary">Código: #30930</small></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- row -->
            <div class="row">
                
            </div>
            <!-- end row -->
        </div>  
<?php
Page::footerTemplate();
?>
