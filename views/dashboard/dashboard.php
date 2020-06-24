<?php
require_once('../../core/helpers/admin-template.php');
Page::headerTemplate('Dashboard', null);
?>
<div class="d-flex flex-column mb-3">
    <div class="d-flex flex-wrap">
        <!-- Textbox de búsqueda -->
        <h3 class="mr-md-3">Dashboard</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col">
                <div class="card card-dashboard border-purple mb-3 w-md-50">
                    <div class="card-header text-purple border-purple">Ordenes</div>
                    <div class="card-body text-purple">
                        <h5 id="pedidos" class="card-title"></h5>
                        <p id="gananciasP" class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-dashboard border-purple mb-3 w-md-50">
                    <div class="card-header text-purple border-purple">Suscripciones</div>
                    <div class="card-body text-purple">
                        <h5  id="suscripciones" class="card-title"></h5>
                        <p  id="gananciasS" class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <h5 class="mb-2">Ventas mensuales</h5>
        <canvas id="chVentas" class="border p-2"></canvas>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12 border p-3 mr-md-3">
        <h6>Productos más vendidos</h6>
        <table id="tableProductos" class="table table-responsive-sm table-hover">
            <thead>
                <tr>
                    <th class="pl-4">Nombre</th>
                    <th>Cantidad</th>
                    <th>Ganancia</th>
                </tr>
            </thead>
            <tbody id="tbody-rows" class="table-bordered">
                
            </tbody>
        </table>
    </div>
    <!-- <div class="col-md-5 border p-3">
        <h6>Últimos pedidos</h6>
        <table id="tablePedidos" class="table table-responsive-sm table-hover">
            <thead>
                <tr>
                    <th class="pl-4">Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-rows" class="table-bordered">
                
            </tbody>
        </table>
    </div> -->
</div>
<?php
Page::footerTemplate( 'dashboard.js' );
?>

