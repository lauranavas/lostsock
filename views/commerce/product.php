<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>

<div class="container cover-general">
            <div class="product-info-card">
                <div class="container-fluid">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <!-- Carousel para el producto -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <!-- Item del carousel -->
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="../../resources/img/socks.jpg" alt="First slide">
                                    </div>
                                    <!-- Item del carousel -->
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="../../resources/img/socks.jpg" alt="Second slide">
                                    </div>
                                    <!-- Item de carousel -->
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="../../resources/img/socks.jpg" alt="Third slide">
                                    </div>
                                </div>
                                <!-- Controladores del carousel, izquierda-->
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <!-- Controladores del carousel, derecha -->
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            
                            <!-- Miniaturas de los productos -->
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                            src="../../resources/img/socks.jpg" /></a></li>
                                <li><a data-target="#pic-2" data-toggle="tab"><img
                                            src="../../resources/img/socks.jpg" /></a></li>
                                <li><a data-target="#pic-3" data-toggle="tab"><img
                                            src="../../resources/img/socks.jpg" /></a></li>
                                <li><a data-target="#pic-4" data-toggle="tab"><img
                                            src="../../resources/img/socks.jpg" /></a></li>
                                <li><a data-target="#pic-5" data-toggle="tab"><img
                                            src="../../resources/img/socks.jpg" /></a></li>
                            </ul>

                        </div>
                        <!-- Detalles de los productos -->
                        <div class="details col-md-6">
                            <h3 class="price">$10</h3>
                            <h2 class="product-title">Banana Socks</h2>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star star-active"></span>
                                    <span class="fa fa-star star-active"></span>
                                    <span class="fa fa-star star-active"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <!-- Descripción de producto -->
                            <p class="product-description mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Fuga quis voluptate eius labore sit tempore,
                                in minus ullam iusto ipsum nemo officia aperiam laboriosam rerum fugit facilis rem beatae
                                at.</p>
                                <!-- Colores -->
                                <div class="colors mb-3">
                                <span class="color orange not-available rounded-circle" data-toggle="tooltip"
                                    title="Sin existencias"></span>
                                <span class="color green rounded-circle"></span>
                                <span class="color blue rounded-circle"></span>
                                </div>
                                <div class="input-group mb-3 input-group-reset">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-text-reset"
                                        for="inputGroupSelect01">Talla</label>
                                </div>
                                <!-- Tallas -->
                                <select class="custom-select custom-select-reset col-sm-1 form-control-lg mr-5"
                                    id="inputGroupSelect01">
                                    <option selected>S</option>
                                    <option value="1">M</option>
                                    <option value="2">L</option>
                                    <option value="3">XL</option>
                                </select>
                                <div>
                                    <input class="form-control input-spinner col-sm-4" type="number" value="1"
                                        id="example-number-input">
                                </div>
                            </div>
                            <!-- Botón de añadir a la cesta -->
                            <div class="action-button">
                                <button class="add-to-cart btn btn-default btn-product-info" type="button">Añadir a la
                                    cesta</button>
                            </div>
                            <!-- Descripción detallada del producto -->
                            <div class="product-detail mt-5">
                                <h5><strong>Categoría: </strong>Hombres</h5>
                                <h5><strong>Tipo: </strong>Calcetines</h5>
                                <h5><strong>Código: </strong>#30930</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Seccion de valoraciones -->
        <div class="container-fluid py-1 mx-auto">
            <div class="row justify-content-center">
                <h2 class="title-border mt-5">Valoraciones</h2>
                <div class="col-12 my-5 d-flex justify-content-between flex-column flex-sm-row align-items-center">
                    <div class="d-flex align-items-center mb-4 mb-sm-0">
                        <h2 class="mx-5 mb-0">4.0 de 5</h2>
                        <div>
                            <span class="fa fa-star star-active"></span>
                            <span class="fa fa-star star-active"></span>
                            <span class="fa fa-star star-active"></span>
                            <span class="fa fa-star star-active"></span>
                            <span class="fa fa-star star-inactive"></span>
                        </div>
                    </div>
                    <!-- Sort by -->
                    <select class="custom-select sort-by mx-5">
                        <option selected>Ordenar por</option>
                        <option value="1">Fecha</option>
                        <option value="2">Relevancia</option>
                        <option value="3">Puntuación</option>
                    </select>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-11 col-12 text-center mb-2">
                    <div class="card card-comment">
                        <div class="row d-flex">
                            <!-- Imagen de perfil del usuario -->
                            <div class="user-profile">
                                <img class="profile-pic" src="../../resources/img/user.jpg">
                            </div>
                            <!-- Nombre del usuario -->
                            <div class="d-flex flex-column">
                                <h3 class="mt-2 mb-0">Ana Laura Navas</h3>
                                <!-- Valoración de usuario -->
                                <div>
                                    <p class="text-left"><span class="text-muted">4.0</span>
                                        <span class="fa fa-star star-active ml-3"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-inactive"></span></p>
                                </div>
                            </div>
                            <!-- Fecha del comentario -->
                            <div class="ml-auto">
                                <p class="text-muted pt-5 pt-sm-3">10 Sept</p>
                            </div>
                        </div>
                        <!-- Comentario -->
                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                                debitis nostrum quia"</h4>
                            <p class="content"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sequi ab
                                nostrum deserunt velit ipsum blanditiis hic culpa libero,
                                necessitatibus commodi sint ad amet repudiandae minus accusantium assumenda cumque ipsam?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-11 col-12 text-center mb-2">
                    <div class="card card-comment">
                        <div class="row d-flex">
                            <div class="user-profile">
                                <img class="profile-pic" src="../../resources/img/user.jpg">
                            </div>
                            <div class="d-flex flex-column">
                                <h3 class="mt-2 mb-0">Ana Laura Navas</h3>
                                <div>
                                    <p class="text-left"><span class="text-muted">4.0</span>
                                        <span class="fa fa-star star-active ml-3"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-inactive"></span></p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <p class="text-muted pt-5 pt-sm-3">10 Sept</p>
                            </div>
                        </div>
                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                                debitis
                                nostrum quia"</h4>
                            <p class="content"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sequi ab
                                nostrum deserunt
                                velit ipsum blanditiis hic culpa libero,
                                necessitatibus commodi sint ad amet repudiandae minus accusantium assumenda cumque ipsam?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-11 col-12 text-center mb-2">
                    <div class="card card-comment">
                        <div class="row d-flex">
                            <div class="user-profile">
                                <img class="profile-pic" src="../../resources/img/user.jpg">
                            </div>
                            <div class="d-flex flex-column">
                                <h3 class="mt-2 mb-0">Ana Laura Navas</h3>
                                <div>
                                    <p class="text-left"><span class="text-muted">4.0</span>
                                        <span class="fa fa-star star-active ml-3"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-active"></span>
                                        <span class="fa fa-star star-inactive"></span>
                                        <span class="fa fa-star star-inactive"></span></p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <p class="text-muted pt-5 pt-sm-3">10 Sept</p>
                            </div>
                        </div>
                        <div class="row text-left">
                            <h4 class="blue-text mt-3">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                                debitis nostrum quia"</h4>
                            <p class="content"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sequi ab
                                nostrum deserunt velit ipsum blanditiis hic culpa libero,
                                necessitatibus commodi sint ad amet repudiandae minus accusantium assumenda cumque ipsam?
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<?php
Page::footerTemplate();
?>