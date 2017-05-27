<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        date_default_timezone_set("America/Guayaquil");
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function verUsuarios()
	{
		$this->load->model('Usuario');

		$usuarios = Usuario::getTodosUsuarios();
		echo "<pre>";
		print_r($usuarios);
		echo "</pre>";

		die();

		$this->load->view('webp/header');
		$this->load->view('webp/verUsuarios',$usuarios);
		$this->load->view('webp/footer');
	}
	public function crearUsuario()
	{
		$this->load->view('header');
		$this->load->view('CrearUsuario');
		$this->load->view('footer');
	}
}
