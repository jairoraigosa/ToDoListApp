<!--Autocomplete css -->
<link href = "<?=base_url()?>assets/css/jquery-ui.css" rel = "stylesheet">
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Listado de actividades</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Recargar</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="white-box col-12">
                <div class="form-group">
                    <label for="buscador_actividades" class="control-label">Buscador de actividades</label>
                    <?php
                    $datoAC="";
                    $coma="";
                    if($actividades){
                        foreach ($actividades as $key => $value) {
                            $datoAC .= $coma.'{label:"'.$value->titulo_actividad.'", value: "'.$value->titulo_actividad.'", actividad_id: "'.$value->actividad_id.'"}';
                            $coma = ",";
                        }
                    }
                    ?>
                    <!-- Autocomplete js  -->
                    <script src = "<?=base_url() ?>assets/js/librerias/jquery-ui.js"></script>
                    <!-- Javascript autocomplete -->
                    <script>
                       $(function() {
                          var actividades  =  [<?=$datoAC?>];
                          $("#buscador_actividades").autocomplete({
                             source: actividades,                                                     
                             select: function(action,datos){
                                 mostrar_actividad_seleccionada(datos.item.actividad_id,"<?=base_url()?>");
                             }
                          });
                       });
                    </script>
                    <input type="text" id="buscador_actividades" class="form-control" placeholder="Escriba una palabra clave y el sistema le irá mostrando sugerencias.">
                </div>
            </div>
        </div>
        <div class="row col-12 m-b-20">
            <span class="pull-right">
                <button onclick="mostrar_actividad_seleccionada('', '<?=base_url()?>')" class="btn btn-info">MOSTRAR TODOS</button>
            </span>
        </div>
        <div class="row" id="divContActividades">
            <?php
            if($actividades){
                foreach ($actividades as $key => $value) {
                    echo '
                    <div class="col-lg-4 col-sm-4">
                        <div class="panel panel-success">
                            <div class="panel-heading"> '.$value->titulo_actividad.'
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-plus"></i></a>  </div>
                            </div>
                            <div class="panel-wrapper collapse" aria-expanded="true">
                                <div class="panel-body">
                                    <p>'.$value->descripcion_actividad.'</p>
                                    <span style="font-size:10px" class="pull-right">
                                        <b>Categoría: </b>'.$value->nombre_categoria.'<br>
                                        <b>Fecha registro: </b>'.$value->fecha_registro.'
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
        <!-- /.right-sidebar -->
    </div>
</div>
<script src="<?=base_url()?>assets/js/actividades/actividad.js"></script>