<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Gestión de comentarios', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <a href="product-inventory.php" class="text-secondary"><i class="fa fa-arrow-left fa-lg pt-auto mr-2" aria-hidden="true"></i></a>
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Comentarios</h3>
        <!-- Grupo de dropdowns -->
        <!-- <div class="d-flex flex-row my-2 my-md-0"> -->
            <!-- Dropdown filtrar por estado -->
            <!-- <div class="dropdown mx-md-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar por
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Más recientes</a>
                    <a class="dropdown-item" href="#">Antiguos</a>
                </div>
            </div>   
        </div> -->
    </div>
</div>
<div id="page-content">
    <p>No hay comentarios sobre este producto.</p>
</div>
<!--
<ul id="pagination-demo" class="pagination-sm"></ul>

<div class="media border p-3">
    <img src="../../resources/img/clientes/default.png" alt="John Doe" class="mr-3 rounded-circle img-avatar">
    <div class="media-body">
        <h4>John Doe <small><i>Publicado el February 19, 2016</i></small></h4>
        <p>Lorem ipsum...</p>
    </div>
</div>
-->
<?php
Page::footerTemplate( 'comentarios.js' );
?>

