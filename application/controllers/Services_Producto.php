<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Producto extends CI_Controller {

	/*
		Tipo: Servicio
		Descripcion: Listar todas los productos de un usuario
	*/
	public function api_listar()
	{
		$this->load->model('producto_model');

		$data = $this->producto_model->listar();
		
		echo json_encode($data);
	}

	/*
		Tipo: Servicio
		Descripcion: Listar todas los productos de un usuario
	*/
	public function api_consultar()
	{
		$this->load->model('producto_model');
		$post = $this->input->post();

		$data = $this->producto_model->consultar($post["id_producto"]);
		
		if(count($data) > 0){
			echo json_encode($data[0]);
		}else{
			echo "{}";
		}
		
	}

	/*
		Tipo: Servicio
		Descripcion: Crear un producto
	*/
	public function api_crear()
	{
		$this->load->model('producto_model');
		$post = $this->input->post();
		$post["id_user"] = $this->session->userdata('id_user_session');

		$this->producto_model->insert_producto($post);
	}


	/*
		Tipo: Servicio
		Descripcion: Editar un producto
	*/
	public function api_editar()
	{
		$this->load->model('producto_model');
		$post = $this->input->post();

		$this->producto_model->update_producto($post);
	}

	/*
		Tipo: Servicio
		Descripcion: Crear un producto
	*/
	public function api_borrar()
	{
		$this->load->model('producto_model');
		$post = $this->input->post();

		$this->producto_model->delete_producto($post["id_borrar"]);
	}
}
