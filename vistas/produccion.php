<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
 
if (!isset($_SESSION["produccion"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
 
if ($_SESSION['produccion']==1)
{
?>

<head>
    <link rel="stylesheet"
        type="text/css"
        href="../public/css/general.css">
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">Produccion <button class="btn btn-success"
                                id="btnagregar"
                                onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>
                                Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"
                        id="listadoregistros">
                        <table id="tbllistado"
                            class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Panadero</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>U. Medida</th>
                                <th>Precio Venta</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <th>Opciones</th>
                                <th>Fecha</th>
                                <th>Panadero</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>U. Medida</th>
                                <th>Precio Venta</th>
                                <th>Estado</th>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"
                        style="height: 400px;"
                        id="formularioregistros">
                        <form name="formulario"
                            id="formulario"
                            method="POST">
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Panadero(*):</label>
                                <input type="hidden"
                                    name="idproduccion"
                                    id="idproduccion">
                                <select id="idpanadero"
                                    name="idpanadero"
                                    class="form-control selectpicker"
                                    data-live-search="true"
                                    required>

                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Producto(*):</label>
                                <select id="idproducto"
                                    name="idproducto"
                                    class="form-control selectpicker"
                                    data-live-search="true"
                                    required>

                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fecha(*):</label>
                                <input type="date"
                                    class="form-control"
                                    name="fecha_hora"
                                    id="fecha_hora"
                                    required="">
                            </div>
                            <div id="divCantidad"
                                class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-8">
                                <label>Cantidad Producida:</label>
                                <input type="text"
                                    class="form-control"
                                    name="cantidadProducida"
                                    id="cantidadProducida"
                                    maxlength="70"
                                    placeholder="Cantidad Producida">
                            </div>
                            <div id="divUMedida"
                                class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <label>Unidad De Medida:</label>
                                <input type="text"
                                    class="form-control"
                                    name="uMedida"
                                    id="uMedida"
                                    maxlength="70"
                                    placeholder="uMedida"
                                    readonly>
                            </div>
                            <div id="divPrecioVenta"
                                class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Precio Venta:</label>
                                <input type="number"
                                    class="form-control"
                                    name="precioVenta"
                                    id="precioVenta"
                                    maxlength="70"
                                    placeholder="Previo Venta">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a data-toggle="modal"
                                    href="#myModal">
                                    <button id="btnAgregarArt"
                                        type="button"
                                        class="btn btn-primary"> <span class="fa fa-plus"></span>
                                        Agregar Materia Prima</button>
                                </a>
                            </div>


                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="detalles"
                                    class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color:#A9D0F5">
                                        <th>Opciones</th>
                                        <th>Materia Prima</th>
                                        <th>Cantidad</th>
                                        <th>U. Medida</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary"
                                    type="submit"
                                    id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                                <button id="btnCancelar"
                                    class="btn btn-danger"
                                    onclick="cancelarform()"
                                    type="button"><i class="fa fa-arrow-circle-left"></i>
                                    Cancelar</button>

                                <button id="btnFinalizar"
                                    class="btn btn-primary"
                                    type="submit"><i class="fa fa-save"></i> Finalizar</button>
                            </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<!-- Modal -->
<div class="modal fade"
    id="myModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true">&times;</button>
                <h4 class="modal-title">Seleccione un Producto</h4>
            </div>
            <div class="modal-body">
                <table id="tblproductos"
                    class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>U. Medida</th>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>U. Medida</th>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-default"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal -->
<?php
}
else
{
  require 'noacceso.html';
}
 
require 'footer.html';
?>
<script type="text/javascript"
    src="scripts/produccion.js"></script>
<?php 
}
ob_end_flush();
?>