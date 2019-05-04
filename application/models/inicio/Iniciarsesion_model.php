<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Iniciarsesion_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function validar_inicio($datos){
        $sql = "SELECT  usuario_id,
                        nombre_completo
                FROM    usuarios
                WHERE   nombre_usuario = '{$datos["user"]}'
                AND     contrasena = md5('{$datos["pwd"]}')
                AND     estado = '1';";
        $result = $this->db->query($sql);
        if($result!==false){
            if($result->num_rows()>0){
                return $result->result()[0];
            }
        }
        return false;
    }
}