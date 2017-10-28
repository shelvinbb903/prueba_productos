<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Categoria extends CI_Controller {

	/*
		Tipo: Servicio
		Descripcion: Listar todas las categorias
	*/
	public function api_listar()
	{
		$this->load->model('categoria_model');

		$data = $this->categoria_model->listar();
		
		echo json_encode($data);
	}
}
