<?php
class Page {
    public static function headerTemplate( $title, $cardTitle){
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('<!DOCTYPE html>
        <html lang="es">
        <head>
            <!-- Se especifica la codificación de caracteres para el documento -->
            <meta charset="utf-8">
            <!-- Se indica al navegador que la página web está optimizada para dispositivos móviles -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Título del documento -->
            <title>'.$title.' | Lost Sock</title>
            <!-- Importación de archivos CSS -->
            <link rel="stylesheet" href="../../resources/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../../resources/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/style.css" type="text/css">
            <link rel="stylesheet" href="../../resources/css/datatables.min.css" type="text/css"/>
            <!-- Llamada a un archivo tipo icono -->
            <link rel="icon" href="../../resources/img/favicon.svg">
        </head>
        <body>
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['idadministrador'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'index.php' && $filename != 'signin.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar">
                    <!-- Sidebar Header -->
                    <div class="sidebar-header">
                        <h3>Lost Sock</h3>
                    </div>
                    <!-- Sidebar elements -->
                    <ul class="list-unstyled components pb-3">
                        <li id="dashboard">
                            <a href="dashboard.php">
                                <i class="fas fa-chart-line"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li id="producto">
                            <a href="#productoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-socks"></i>
                                <span class="menu-title">Productos</span>
                            </a>
                            <ul class="collapse list-unstyled" id="productoSubmenu">
                                <li>
                                    <a href="product-inventory.php">Inventario</a>
                                </li>
                                <li>
                                    <a href="product-category.php">Categorías</a>
                                </li>
                                <li>
                                    <a href="product-colors.php">Colores</a>
                                </li>
                                <li>
                                    <a href="product-sizes.php">Tallas</a>
                                </li>
                                <li>
                                    <a href="product-type.php">Tipos</a>
                                </li>
                            </ul>
                        </li>
                        <li id="pedido">
                            <a href="orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="menu-title">Pedidos</span>
                            </a>
                        </li>
                        <li id="suscripcion">
                            <a href="#suscripcionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-shipping-fast"></i>
                                <span class="menu-title">Suscripciones</span>
                            </a>
                            <ul class="collapse list-unstyled" id="suscripcionSubmenu">
                                <li>
                                    <a href="suscriptions.php">Listado</a>
                                </li>
                                <li>
                                    <a href="suscription-frecuency.php">Frecuencia</a>
                                </li>
                                <li>
                                    <a href="suscription-plans.php">Planes</a>
                                </li>
                                <li>
                                    <a href="shipping-costs.php">Costos de envío</a>
                                </li>
                            </ul>
                        </li>
                        <li id="clientes">
                            <a href="clients.php">
                                <i class="fas fa-user"></i>
                                <span class="menu-title">Clientes</span>
                            </a>
                        </li>
                        <li id="administrador">
                            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fas fa-user-shield"></i>
                                <span class="menu-title">Administradores</span>
                            </a>
                            <ul class="collapse list-unstyled" id="adminSubmenu">
                                <li>
                                    <a href="admin-list.php">Listado</a>
                                </li>
                                <li>
                                    <a href="admin-type.php">Tipos de usuario</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>        
                <!-- Contenido principal de la página -->
                <div id="content">
                    <!-- Topbar -->
                    <header>
                        <nav class="navbar sticky-top navbar-expand-lg navbar-light top-bar">
                            <!-- Left Toogle-->
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <button class="navbar-toggler toggle" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav ml-auto">         
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.$_SESSION['nombres'].' '.$_SESSION['apellidos'].'
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="admin-settings.php">Ajustes</a>
                                        <a class="dropdown-item" href="#" onclick="signOff()">Cerrar sesión</a>
                                    </div>
                                    </li>
                                </ul>
                            </div>
                          </nav>
                    </header>                    
                    <!-- Contenido principal -->
                    <main class="container-fluid px-md-5 pb-md-5 mt-5">
                ');
            } else {
                header('location: dashboard.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ( $filename != 'index.php' && $filename != 'signin.php' && $filename != 'recover-email.php' && $filename != 'recover-pass.php' ) {
                header('location: index.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                <header>
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="#" width="30" height="30" class="d-inline-block align-top" alt="">
                        Lost Sock
                    </a>
                    <p class="my-auto ml-auto">Ir al <a href="../commerce/index.php">sitio público</a></p>
                </nav>
            </header>
            <main class="sign-in-bg d-flex align-items-center">       
                <div class="container">
                    <div class="row justify-content-md-center">
                ');
                if ($filename == 'signin.php') {
                    print('
                    <div class="col-lg-7 col-md-9 col-sm-6">
                    <div class="card">
                        <div class="card-body m-3 m-md-4 m-xs-2">
                            <h3 class="card-title">'.$cardTitle.'</h3>
                    ');
                } else {
                    print('
                    <div class="col-lg-5 col-md-7 col-sm-4">
                    <div class="card">
                        <div class="card-body m-3 m-md-4 m-xs-2">
                            <h3 class="card-title">'.$cardTitle.'</h3>
                    ');
                }                
            }
        }    
    }

    public static function footerTemplate($controller){
        if ( $controller != null ) {
            print('     </main>
                    </div>
                </div>
                <!-- Modals -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
                <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
                <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
                <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../resources/js/Chart.bundle.min.js" type="text/javascript"></script>
                <script src="../../resources/js/datatables.min.js" type="text/javascript"></script>
                <script src="../../resources/js/jquery.twbsPagination.min.js" type="text/javascript"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script src="../../core/helpers/components.js" type="text/javascript"></script>
                <script src="../../core/controllers/dashboard/sesion-actual.js" type="text/javascript"></script>
                <script src="../../core/controllers/dashboard/'.$controller.'" type="text/javascript"></script>
            </body>
            </html>'
            );
        } else {
            print('     </main>
                    </div>
                </div>
                <!-- Modals -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
                <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
                <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
                <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../resources/js/Chart.bundle.min.js" type="text/javascript"></script>
                <script src="../../resources/js/datatables.min.js" type="text/javascript"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script src="../../core/helpers/components.js" type="text/javascript"></script>
                <script src="../../core/controllers/dashboard/sesion-actual.js" type="text/javascript"></script>
            </body>
            </html>'
            );
        }
        
        
    }

    public static function footerSignIn($controller){
        print('         </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
        <!-- Modals -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- Importación de archivos JavaScript al final del documento para una carga optimizada -->
        <script src="../../resources/js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="../../resources/js/popper.min.js" type="text/javascript"></script>
        <script src="../../resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
        <script src="../../core/helpers/components.js" type="text/javascript"></script>
        <script src="../../core/controllers/dashboard/sesion-actual.js" type="text/javascript"></script>
        <script src="../../core/controllers/dashboard/'.$controller.'" type="text/javascript"></script>
        </body>
        </html>');
    }
}
?>