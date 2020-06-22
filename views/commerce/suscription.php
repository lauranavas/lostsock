<?php
require_once('../../core/helpers/template-commerce.php');
Page::headerTemplate('Lost Sock');
?>
<body>
    <!-- Contenido principal del documento -->
    <div class="jumbotron jumbotron-fluid cover jumbotron-sizing bg-image jumbotron-suscripcion">
        <div class="container">
            <h1 class="display-3">La creatividad a tus pies</h1>
        </div>
        <div class="info-btns">
            <a href="#" class="btn cart-btn">Comprar ahora</a>
        </div>
    </div>
    <section class="container-fluid section-info">
        <div class="row justify-content-center">
            <div class="text-center col-md-6 justify-content-center">
                <img src="../../resources/img/socks.jpg" alt="..." class="img-fluid float-right img-size">
            </div>
            <div class="text-center col-md-6 justify-content-center orientacion">
                <h2>Lorem ipsum</h2>
                <br>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus, error architecto,
                    debitis iste pariatur cum quis officiis quae illo blanditiis, eum earum ad voluptas
                    nobis adipisci exercitationem nisi! Aut, odio?</p>
                <button>
                    Lorem
                </button>
            </div>
        </div>
    </section>
    <section class="container-fluid section-info">
        <div class="row justify-content-center no-gutters">
            <div class="card text-center">
                <div class="card-body">
                    <div class="fas fa-heart"></div>
                    <h5 class="card-title">Lorem Ipsum</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia ultrices
                        ipsum sit amet malesuada. Sed ac scelerisque felis. Phasellus commodo nibh et lorem finibus, a
                        tempus neque imperdiet. Donec convallis neque quis luctus euismod.</p>
                </div>
            </div>
    
            <div class="card text-center mx-5">
                <div class="card-body">
                    <div class="fas fa-truck"></div>
                    <h5 class="card-title">Lorem Ipsum</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia ultrices
                        ipsum sit amet malesuada. Sed ac scelerisque felis. Phasellus commodo nibh et lorem finibus, a
                        tempus neque imperdiet. Donec convallis neque quis luctus euismod.</p>
                </div>
            </div>
    
            <div class="card text-center">
                <div class="card-body">
                    <div class="fas fa-piggy-bank"></div>
                    <h5 class="card-title">Lorem Ipsum</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia ultrices
                        ipsum sit amet malesuada. Sed ac scelerisque felis. Phasellus commodo nibh et lorem finibus, a
                        tempus neque imperdiet. Donec convallis neque quis luctus euismod.</p>
                </div>
            </div>
    
        </div>
<?php
Page::footerTemplate();
?>