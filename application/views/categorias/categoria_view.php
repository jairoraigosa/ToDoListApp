<!--Autocomplete css -->
<link href = "<?=base_url()?>assets/css/jquery-ui.css" rel = "stylesheet">
<link href="<?=base_url()?>estilos/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Page Content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Registrar categoría</h4>
            </div>
            <div class="modal-body">
                <form class="form" id="formRegistrarCategoria" action="javascript:registrar_categoria('<?=base_url()?>');">
                    <div class="form-group">
                        <label class="control-label">Nombre de la categoría</label>
                        <input type="text" id="categoria" class="form-control" placeholder="Ingrese la categoría.">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-info">REGISTRAR</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Categorías</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Recargar</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.right-sidebar -->
    </div>
    <div class="white-box">
        <span class="pull-right">
            <button class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Nueva Categoría <i class="fa fa-plus"></i></button>
        </span>
        <div class="col-sm-12 row">
            <p class="text-muted m-b-30">LISTADO DE CATEGORIAS</p>
            <div class="table-responsive" id="divContTabla">
                <?php
                if(empty($categorias) || !isset($categorias)){
                    echo '<div class="col-12 text-center"><b class="text-danger">NO SE ENCONTRARON REGISTROS</b></div>';
                }else{
                ?>
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id categoría</th>
                            <th>Nombre de categoría</th>
                            <th>Fecha de registro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categorias as $key => $value) {
                            echo '
                            <tr>
                                <td>'.$value->categoria_id.'</td>
                                <td>
                                    <div id="div_nombre_categoria'.$value->categoria_id.'">
                                        '.$value->nombre_categoria.'
                                    </div>
                                    <div style="display:none" id="mod_nombre_categoria'.$value->categoria_id.'">
                                        <input type="text" id="nombre_categoria'.$value->categoria_id.'" value="'.$value->nombre_categoria.'" class="form-control" placeholder="Nombre de la categoría">
                                    </div>
                                </td>
                                <td>'.$value->fecha_registro.'</td>
                                <td class="text-center">
                                    <div id="op_mod_categoria'.$value->categoria_id.'">
                                        <i onclick="mostrar_modificar('.$value->categoria_id.');" title="MODIFICAR" class="fa fa-edit text-success" style="cursor: pointer; font-size: 25px"></i>&nbsp;
                                        <i onclick="eliminar_categoria('.$value->categoria_id.',\''.base_url().'\');" title="ELIMINAR" class="fa fa-trash text-danger" style="cursor: pointer; font-size: 25px"></i>
                                    </div>
                                    <div style="display:none" id="mod_categoria'.$value->categoria_id.'">
                                        <i onclick="modificar_categoria('.$value->categoria_id.',\''.base_url().'\');" title="MODIFICAR" class="ti-check text-success" style="cursor: pointer; font-size: 25px"></i>&nbsp;
                                        <i onclick="ocultar_modificar('.$value->categoria_id.');" title="CANCELAR" class="ti-close text-danger" style="cursor: pointer; font-size: 25px"></i>
                                    </div>
                                </td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script src="<?=base_url()?>estilos/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/js/categorias/categoria.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>