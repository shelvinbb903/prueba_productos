<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_Producto extends CI_Controller {

	/*
		Tipo: Vista
		Descripcion: Listado de productos del usuario
	*/
	public function listado()
	{
		$data = [
			"title" => "Productos"
		];
		$this->load->view('open_page',$data);
		$this->load->view('productos/listado');
		$this->load->view('close_page');
	}
}
