<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actividad extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model("actividades/actividad_model");
        $this->load->model("categorias/categoria_model");
        $this->validar_sesion->validar_sesion();
    }
    function index(){
        $datos["categorias"] = $this->categoria_model->getCategorias();
        $datos["actividades"] = $this->actividad_model->getActividades();
        $this->load->view('global/header_view');
        $this->load->view('actividades/actividad_view',$datos);
        $this->load->view('global/footer_view');
    }
    
    function registrar_actividad(){
        $titulo_actividad = $_REQUEST["titulo_actividad"];
        $descripcion_actividad = $_REQUEST["descripcion_actividad"];
        $categoria_actividad = $_REQUEST["categoria_actividad"];
        $rst["registro"] = $this->actividad_model->registrar_actividad($titulo_actividad, $descripcion_actividad, $categoria_actividad);
        echo json_encode($rst);
    }
    
    function modificar_actividad(){
        $actividad_id = $_REQUEST["actividad_id"];
        $nuevo_titulo = $_REQUEST["nuevo_titulo"];
        $nueva_descripcion = $_REQUEST["nueva_descripcion"];
        $nueva_categoria = $_REQUEST["nueva_categoria"];
        $rst["modificacion"] = $this->actividad_model->modificar_actividad($actividad_id,$nuevo_titulo,$nueva_descripcion,$nueva_categoria);
        echo json_encode($rst);
    }
    
    function eliminar_actividad(){
        $actividad_id = $_REQUEST["actividad_id"];
        $rst["eliminacion"] = $this->actividad_model->eliminar_actividad($actividad_id);
        echo json_encode($rst);
    }
    
    function getActividades(){
        $categorias = $this->categoria_model->getCategorias();
        $actividades = $this->actividad_model->getActividades();
        if(empty($actividades) || !isset($actividades)){
                $html = '<div class="col-12 text-center"><b class="text-danger">NO SE ENCONTRARON REGISTROS</b></div>';
        }else{
            $html = '
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
                <tbody>';
                foreach ($actividades as $key => $value) {
                    $html.= '
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
                                            $html.= '<option value="'.$v->categoria_id.'">'.$v->nombre_categoria.'</option>';
                                        }
                                    }
                                $html.= '
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
                $html.='
                </tbody>
            </table>';
        }
        echo $html;
    }
    
    function getActividadSeleccionada(){
        $actividad_id = $_REQUEST["actividad_id"];
        $actividades = $this->actividad_model->getActividades($actividad_id);
        $html="";
        $css = "col-lg-4 col-sm-4";
        if($actividad_id!==""){
            $css = "col-12";
        }
        if($actividades){
            foreach ($actividades as $key => $value) {
                $html.= '
                <div class="'.$css.'">
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
        echo $html;
    }
}