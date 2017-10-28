<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_Usuario extends CI_Controller {

	/*
		Tipo: Vista
		Descripcion: Inicio de sesion de usuarios
	*/
	public function login()
	{
		$data = [
			"title" => "Inicio de Sesion"
		];
		$this->load->view('open_page',$data);
		$this->load->view('login');
		$this->load->view('close_page');
	}
}
