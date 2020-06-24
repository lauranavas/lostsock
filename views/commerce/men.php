<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Hombres');
?>
<!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid jumbotron-cover cover-general cover-image">
            <div class="container">
                <h2 class="font-weight-normal titulo--cover">Colección para hombres</h2>
            </div>
        </div>
        <!-- Grupo de cards para productos -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle="tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3  mb-5">
                    <div class="card product--detail custom--card">
                        <img class="card-img-top" src="../../resources/img/socks.jpg" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <!-- Título de la card -->
                                    <h5 class="card-title">WHALE SOCK</h5>
                                </div>
                                <div class="col-4">
                                    <p class="float-right text-purple font-weight-bold">$5</p>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class="mb-3 float-left">
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--purple"></span>
                                        <span class="dot product--color bg--inactive data-toggle=" tooltip" title="Sin existencias"></span>
                                    </div>
                               </div>
                               <div class="col-6 text-center">
                                    <!-- Colores -->
                                    <div class=" mb-3">
                                        <div class="star--card float-right">
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                            <span class="fa fa-star text-yellow" id="product--star"></span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                           <div class="row">
                               <div class="col-6 text-center">
                                    <!-- Tallas -->
                                <div class="dropdown">
                                    <button class="btn btn-muted btn-sm dropdown-toggle float-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Talla
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">S</a>
                                        <a class="dropdown-item" href="#">M</a>
                                        <a class="dropdown-item" href="#">L</a>
                                    </div>
                                </div>
                               </div>
                               <div class="col-6 text-center">
                                    <input class="form-control form-control-sm float-right" type="number">
                               </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary btn-add custom--button" href="dashboard.php">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>  
<?php
Page::footerTemplate();
?>