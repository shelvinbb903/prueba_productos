<?php
class Producto_model extends CI_Model {

    /*
        Tipo: Metodo
        Descripcion: Listar todas los productos de un usuario.
    */
    public function listar()
    {
    	$this->db->select('productos.*, categoria.descripcion as descripcion_categoria');
		$this->db->from('productos');
		$this->db->join('categoria', 'categoria.id = productos.id_categoria');
		$this->db->order_by("categoria.descripcion", "asc"); 
        $query = $this->db->get();
        return $query->result();
    }
    /*
        Tipo: Metodo
        Descripcion: Consultar producto por su id
    */
    public function consultar($id_producto)
    {
            $this->db->where('id', $id_producto); 
            $query = $this->db->get('productos');
            return $query->result();
    }

    /*
        Tipo: Metodo
        Descripcion: Crear un producto
    */
 	public function insert_producto($datos)
    {
        $data = [
        	"nombre" => $datos["nombre"],
        	"descripcion" => $datos["descripcion"],
        	"costo" => $datos["costo"],
        	"id_categoria" => $datos["categoria"],
        	"id_usuario" => $datos["id_user"]
        ]; 
        $this->db->insert('productos', $data);
    }

    /*
        Tipo: Metodo
        Descripcion: Actualizar un producto
    */
 	public function update_producto($datos)
    {
        $data = [
        	"nombre" => $datos["nombre"],
        	"descripcion" => $datos["descripcion"],
        	"costo" => $datos["costo"],
        	"id_categoria" => $datos["categoria"]
        ]; 
        $this->db->where('id', $datos["id"]); 
        $this->db->update('productos', $data);
    }

    /*
        Tipo: Metodo
        Descripcion: Borrar un producto
    */
 	public function delete_producto($id_producto)
    {
        $this->db->where('id', $id_producto);
		$this->db->delete('productos'); 
    }
}
