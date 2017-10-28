<?php
class Usuario_model extends CI_Model {

        /*
                Tipo: Metodo
                Descripcion: Consultar usuarios por email y clave encriptada.
        */
        public function login($usuario, $clave)
        {
                $this->db->where('email', $usuario); 
                $this->db->where('clave', $clave); 
                $query = $this->db->get('usuarios');
                return $query->result();
        }

}
