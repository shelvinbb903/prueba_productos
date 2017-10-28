<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Usuario extends CI_Controller {

	/*
		Tipo: Servicio
		Descripcion: Iniciar sesion con usuario y clave y guardar respuesta en la session.
	*/
	public function api_iniciar_sesion()
	{
		$this->load->model('usuario_model');

		$post = $this->input->post();
		$post["clave"] = base64_encode($post["clave"]);
		$data = $this->usuario_model->login($post["email"], $post["clave"]);
		if(count($data) > 0){
			$array_response = array('ESTADO' => "OK");
			$data_session = [
				"id_user_session" => $data[0]->id,
				"rol_user_session" => $data[0]->rol
			];
			$this->session->set_userdata($data_session);
		}else{
			$array_response = array('ESTADO' => "ERROR");
		}

		echo json_encode($array_response);
	}

	/*
		Tipo: Servicio
		Descripcion: Cerrar sesion y se borran los datos de la session.
	*/
	function api_cerrar_sesion(){
		$this->session->unset_userdata('id_user_session');
		$this->session->unset_userdata('rol_user_session');
		
	}
}
