<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model("categorias/categoria_model");
        $this->validar_sesion->validar_sesion();
    }
    function index(){
        $datos["categorias"] = $this->categoria_model->getCategorias();
        $this->load->view('global/header_view');
        $this->load->view('categorias/categoria_view',$datos);
        $this->load->view('global/footer_view');
    }
    
    function registrar_categoria(){
        $categoria = $_REQUEST["categoria"];
        $rst["registro"] = $this->categoria_model->registrar_categoria($categoria);
        $rst = json_encode($rst);
        echo $rst;
    }
    
    function modificar_categoria(){
        $categoria_id = $_REQUEST["categoria_id"];
        $nuevo_nombre = $_REQUEST["nuevo_nombre"];
        $rst["modificacion"] = $this->categoria_model->modificar_categoria($categoria_id, $nuevo_nombre);
        $rst = json_encode($rst);
        echo $rst;
    }
    
    function eliminar_categoria(){
        $categoria_id = $_REQUEST["categoria_id"];
        if($this->categoria_model->categoria_con_actividad($categoria_id)){//validacion para saber si la categoria tiene un registro de actividad para impedir la eliminacion
            $rst["eliminacion"]=false;
            $rst["msj"]="CATEGORIACONREGISTRO";
        }else{
            $rst["eliminacion"] = $this->categoria_model->eliminar_categoria($categoria_id);
        }
        $rst = json_encode($rst);
        echo $rst;
    }
    
    function getDatosCategorias(){
        $categorias = $this->categoria_model->getCategorias();
        if(empty($categorias) || !isset($categorias)){
            $html = '<div class="col-12 text-center"><b class="text-danger">NO SE ENCONTRARON REGISTROS</b></div>';
        }else{
            $html = '
            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id categoría</th>
                        <th>Nombre de categoría</th>
                        <th>Fecha de registro</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($categorias as $key => $value) {
                    $html .= '
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
                $html .= '
                </tbody>
            </table>';
        }
        echo $html;
    }
}