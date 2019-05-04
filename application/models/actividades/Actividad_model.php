<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Actividad_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function registrar_actividad($titulo_actividad, $descripcion_actividad, $categoria_actividad){
        $sql = "INSERT INTO actividades (
                                            titulo_actividad,
                                            descripcion_actividad,
                                            categoria_id,
                                            usuario_id
                                        )
                                VALUES  (
                                            '".addslashes($titulo_actividad)."',
                                            '".addslashes($descripcion_actividad)."',
                                            $categoria_actividad,
                                            {$this->session->userdata("usuario_id")}
                                        );";
        return $this->db->query($sql);
    }
    
    function getActividades($actividad_id=""){
        $and = "";
        if($actividad_id!==""){
            $and = "AND a.actividad_id = $actividad_id";
        }
        $sql = "SELECT  a.actividad_id,
                        a.titulo_actividad,
                        a.descripcion_actividad,
                        a.categoria_id,
                        b.nombre_categoria,
                        DATE_FORMAT(a.fecha_registro, \"%d/%m/%Y %h:%i %p\") as fecha_registro
                FROM    actividades as a
                JOIN    categorias as b ON (a.categoria_id = b.categoria_id)
                WHERE   a.usuario_id = {$this->session->userdata("usuario_id")}
                        $and;";
        $rst = $this->db->query($sql);
        if($rst){
            if($rst->num_rows()>0){
                return $rst->result();
            }
        }
        return false;
    }
    
    function modificar_actividad($actividad_id,$nuevo_titulo,$nueva_descripcion,$nueva_categoria){
        $sql = "UPDATE  actividades 
                SET     titulo_actividad = '".addslashes($nuevo_titulo)."',
                        descripcion_actividad = '".addslashes($nueva_descripcion)."',
                        categoria_id = $nueva_categoria
                WHERE   actividad_id = $actividad_id;";
        return $this->db->query($sql);
    }
    
    function eliminar_actividad($actividad_id){
        $sql = "DELETE FROM actividades
                WHERE   actividad_id = $actividad_id;";
        return $this->db->query($sql);
    }
}