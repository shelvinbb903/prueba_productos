<?php
class Categoria_model extends CI_Model {

    /*
            Tipo: Metodo
            Descripcion: Listar todas las categorias.
    */
    public function listar()
    {
            $query = $this->db->get('categoria');
            return $query->result();
    }

}
