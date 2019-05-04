<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function registrar_categoria($categoria){
        $sql = "INSERT INTO categorias (
                                            usuario_id,
                                            nombre_categoria
                                        )
                            VALUES      (
                                            {$this->session->userdata("usuario_id")},
                                            '".addslashes($categoria)."'
                                        );";
        return $this->db->query($sql);
    }
    
    function getCategorias(){
        $sql = "SELECT  categoria_id,
                        nombre_categoria,
                        DATE_FORMAT(fecha_registro, \"%d-%m-%Y %h:%i %p\") as fecha_registro
                FROM    categorias
                WHERE   usuario_id = {$this->session->userdata("usuario_id")};";
        $rst = $this->db->query($sql);
        if($rst!==false){
            if($rst->num_rows()>0){
                $datos = $rst->result();
                return $datos;
            }
        }
        return false;
    }
    
    function modificar_categoria($categoria_id, $nuevo_nombre){
        $sql = "UPDATE  categorias
                SET     nombre_categoria = '".addslashes($nuevo_nombre)."'
                WHERE   categoria_id = $categoria_id;";
        return $this->db->query($sql);
    }
    
    function eliminar_categoria($categoria_id){
        $sql = "DELETE FROM categorias
                WHERE       categoria_id = $categoria_id;";
        return $this->db->query($sql);
    }
    
    function categoria_con_actividad($categoria_id){
        $sql = "SELECT  actividad_id
                FROM    actividades
                WHERE   categoria_id = $categoria_id;";
        $rst = $this->db->query($sql);
        if($rst){
            if($rst->num_rows()>0){
                return true;
            }
        }
        return false;
    }
}