<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database('default');
        $this->load->model("inicio/iniciarsesion_model");
        $this->load->model("actividades/actividad_model");
    }
    function index(){
        if($this->session->userdata("logueado")===TRUE){
            $datos["actividades"]=$this->actividad_model->getActividades();
            $this->load->view('global/header_view');
            $this->load->view('inicio/paginainicial_view',$datos);
            $this->load->view('global/footer_view');
        }else{
            $this->load->view('login/login_view');
        }
    }
    
    function iniciar_sesion(){
        $datos = $_REQUEST;
        $login = $this->iniciarsesion_model->validar_inicio($datos);
        if($login){
            $this->session->set_userdata(array('logueado' => TRUE,
                                               'usuario_id' => $login->usuario_id,
                                               'nombre_usuario_completo' => $login->nombre_completo
                                        ));
            echo "CORRECTO";
        }else{
            echo "INCORRECTO";
        }
    }
    
    function cerrar_sesion(){
        $this->session->sess_destroy();
    }
}