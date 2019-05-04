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
                <h4 class="modal-title" id="myLargeModalLabel">Registrar actividad</h4>
            </div>
            <div class="modal-body">
                <form class="form" id="formRegistroActividad" action="javascript:registrar_actividad('<?=base_url()?>');">
                    <div class="form-group">
                        <label class="control-label">Titulo de la actividad</label>
                        <input type="text" id="titulo_actividad" class="form-control" placeholder="Ingrese el titulo de la actividad.">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción de la actividad</label>
                        <textarea id="descripcion_actividad" class="form-control" placeholder="Ingrese la descripción de la actividad."></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Categoría</label>
                        <select id='categoria_actividad' class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php
                            foreach ($categorias as $key => $value) {
                                echo '<option value="'.$value->categoria_id.'">'.$value->nombre_categoria.'</option>';
                            }
                            ?>
                        </select>
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
                <h4 class="page-title">Actividades</h4>
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
            <button class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">Nueva Actividad <i class="fa fa-plus"></i></button>
        </span>
        <div class="col-sm-12 row">
            <p class="text-muted m-b-30">LISTADO DE ACTIVIDADES</p>
            <div class="table-responsive" id="divContTabla">
                <?php
                if(empty($actividades) || !isset($actividades)){
                    echo '<div class="col-12 text-center"><b class="text-danger">NO SE ENCONTRARON REGISTROS</b></div>';
                }else{
                ?>
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Fecha registro</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($actividades as $key => $value) {
                            echo '
                            <tr>
                                <td>'.$value->actividad_id.'</td>
                                <td>
                                    <div id="div_titulo'.$value->actividad_id.'">
                                        '.$value->titulo_actividad.'
                                    </div>
                                    <div style="display:none" id="mod_titulo_actividad'.$value->actividad_id.'">
                                        <input type="text" id="titulo_actividad'.$value->actividad_id.'" value="'.$value->titulo_actividad.'" class="form-control" placeholder="Ingrese el titulo de la actividad.">
                                    </div>
                                </td>
                                <td>
                                    <div id="div_descripcion'.$value->actividad_id.'">
                                        '.$value->descripcion_actividad.'
                                    </div>
                                    <div style="display:none" id="mod_descripcion_actividad'.$value->actividad_id.'">
                                        <textarea id="descripcion_actividad'.$value->actividad_id.'" class="form-control">'.$value->descripcion_actividad.'</textarea>
                                    </div>
                                </td>
                                <td>
                                    <div id="div_categoria'.$value->actividad_id.'">
                                        '.$value->nombre_categoria.'
                                    </div>
                                    <div style="display:none" id="mod_categoria_actividad'.$value->actividad_id.'">
                                        <select id="categoria_actividad'.$value->actividad_id.'" class="form-control">
                                            <option value="'.$value->categoria_id.'">'.$value->nombre_categoria.'</option>';
                                            foreach ($categorias as $k => $v) {
                                                if($v->categoria_id!==$value->categoria_id){
                                                    echo '<option value="'.$v->categoria_id.'">'.$v->nombre_categoria.'</option>';
                                                }
                                            }
                                        echo '
                                        </select>
                                    </div>
                                </td>
                                <td>'.$value->fecha_registro.'</td>
                                <td class="text-center">
                                    <div id="op_mod_actividad'.$value->actividad_id.'">
                                        <i onclick="mostrar_modificar('.$value->actividad_id.');" title="MODIFICAR" class="fa fa-edit text-success" style="cursor: pointer; font-size: 25px"></i>&nbsp;
                                        <i onclick="eliminar_actividad('.$value->actividad_id.',\''.base_url().'\');" title="ELIMINAR" class="fa fa-trash text-danger" style="cursor: pointer; font-size: 25px"></i>
                                    </div>
                                    <div style="display:none" id="mod_actividad'.$value->actividad_id.'">
                                        <i onclick="modificar_actividad('.$value->actividad_id.',\''.base_url().'\');" title="MODIFICAR" class="ti-check text-success" style="cursor: pointer; font-size: 25px"></i>&nbsp;
                                        <i onclick="ocultar_modificar('.$value->actividad_id.');" title="CANCELAR" class="ti-close text-danger" style="cursor: pointer; font-size: 25px"></i>
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
<script src="<?=base_url()?>assets/js/actividades/actividad.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>