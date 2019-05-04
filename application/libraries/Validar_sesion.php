<?php
class Validar_sesion{
    // Constructor
    public function __construct(){
        if (!isset($this->CI)){
            $this->CI = get_instance();
        }
    }

    public function validar_sesion(){
        if ($this->CI->session->userdata('logueado') != TRUE){
            redirect('inicio', 'refresh');
            exit();
        }
    }
}