<?php
class Page {
    public static function headerTemplate($title){
        print('<!DOCTYPE html>
    <html lang="es">
        <head>
            <!-- Se especifica la codificación de caracteres para el documento -->
            <meta charset="utf-8">
            <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Título del documento -->
            <title>'.$title.'</title>
            <!-- Importación de archivos CSS -->
            <link rel="stylesheet" href="../../resources/css/normalize.css">
            <link rel="stylesheet" href="../../resources/css/all.min.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/publicstyle.css" type="text/css">
            <link rel="shortcut icon" href="../../resources/img/favicon.svg" type="image/x-icon"> 
        </head>
        <body>
            <!--Encabezado del documento-->
            <header class="">
                <!-- Toggle button -->
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Toggle button -->
                <div class="overlay"></div>
                <!-- Menú/nav -->
                <nav class="navegation fixed-top">
                    <div class="close">
                    <i class="fas fa-times close-icon"></i>
                    </div>
                    <!-- Logo del menú -->
                    <div class="logo">
                        <a href="index.php">
                            <img src="../../resources/img/logos.svg" alt="logo">
                        </a>
                    </div>
                    <!-- Logo del menú -->
                    <!-- Parte central del nav -->
                    <div class="nav-middle">
                        <ul>
                            <li>
                                <a href="women.php">Mujeres</a>
                            </li>
                            <li>
                                <a href="men.php">Hombres</a>
                            </li>
                            <li>
                                <a href="kids.php">Niños</a>
                            </li>
                            <li>
                                <a href="exclusive.php">Exclusivo</a>
                            </li>
                            <li>
                                <a href="suscription.php">Suscripción</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Parte central del nav -->
                    <!-- Parte derecha del nav -->
                    <div class="nav-right">
                        <ul>
                            <li>
                                <a href="account.php"><i class="fas fa-user"></i></a>
                            </li>
                            <li>
                                <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Parte derecha del nav -->
                </nav>
                <!-- Menú/nav -->
            </header>
            <main>
            <!-- Contenido principal -->');
        }
        public static function footerTemplate(){
            print('            </main>
            <hr>
            <!-- Pie del documento -->
            <footer class="page-footer font-small pt-4 px-md-5">
                <!-- Footer Links -->
                <div class="container-fluid text-center text-md-left">
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0">
                            <!-- Links -->
                            <p class="text-uppercase font-weight-bold">CATEGORÍAS</hp>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="men.php">Hombres</a>
                                </li>
                                <li>
                                    <a href="women.php">Mujeres</a>
                                </li>
                                <li>
                                    <a href="kids.php">Niños</a>
                                </li>
                                <li>
                                    <a href="exclusive.php">Exclusivos</a>
                                </li>
                                <li>
                                    <a href="suscription.php">Suscripción</a>
                                </li>
                            </ul>
                            <!-- Links -->
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 mb-md-0">
                            <!-- Links -->
                            <p class="text-uppercase font-weight-bold">NAVEGAR</hp>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>
                                <li>
                                    <a href="about.php">Sobre nosotros</a>
                                </li>
                                <li>
                                    <a href="terms.php">Condiciones de envío</a>
                                </li>
                                <li>
                                    <a href="policy.php">Política de devolución</a>
                                </li>
                            </ul>
                            <!-- Links -->
                        </div>
                        <!-- Grid column -->
                        <hr class="clearfix w-100 d-md-none pb-3">
                        <!-- Grid column -->
                        <div class="col-md-6 mt-md-0 mt-3 text-md-right text-center">
                            <!-- Content -->
                            <p>
                                <a href="https://instagram.com/" class="mx-3">
                                    <i class="fab fa-instagram text-purple"></i>
                                </a>
                                <a href="https://facebook.com/" class="mx-3">
                                    <i class="fab fa-facebook text-purple"></i>
                                </a>
                                <a href="https://twitter.com/" class="mx-3">
                                    <i class="fab fa-twitter text-purple"></i>
                                </a>
                            </p>
                            <p><a href="https://gmail.com/"><span class="fad fa-envelope text-purple mx-3"></span>hello@lostsocksociety.com</a></p>
                            <div class="logo">
                                <a href="index.php">
                                    <img src="../../resources/img/logos.svg" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
                <!-- Footer Links -->
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">©2020 Copyright Lost Sock. Todos los derechos reservados.</div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
                <!-- Archivos JavaScript -->
                <!-- jQuery primero, luego Popper.js y Bootstrap JS -->
                <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
                <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
                <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
                <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../resources/js/main.js" type="text/javascript"></script>
                <script src="../../resources/js/all.min.js" type="text/javascript"></script>
                <!-- Latest compiled and minified CSS -->
        </body>
    </html>');
    }
}
?>