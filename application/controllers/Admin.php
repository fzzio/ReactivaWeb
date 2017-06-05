<?php 

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Admin extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->model('UserAdmin');
		$this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		
		
		date_default_timezone_set("America/Guayaquil");
	}

	public function index(){
		if ($this->AdminSecurityCheck()){
            $dataHeader['titlePage'] = "Reactiva";

            $data['header'] = $this->load->view('admin/header', $dataHeader);
            $data['menu'] = $this->load->view('admin/menu', array());

            $data['contenido'] = $this->load->view('admin/index', array());
            $data['footer'] = $this->load->view('admin/footer-gc', array());
		}else{
			redirect("admin/login");
		}
	}

	public function login(){
		if ($this->AdminSecurityCheck()){
			 redirect("admin/index");
		}else{
			$dataHeader['PageTitle'] = "Reactiva";

			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['contenido'] = $this->load->view('admin/login', array());
			$data['footer'] = $this->load->view('admin/footer', array());
		}
	}

	public function logout(){
		if ($this->AdminSecurityCheck()){
			$userAdmin = new UserAdmin();
			$userAdmin->logout();
			redirect("admin/login");
		}else{
			redirect("admin/login");
		}
	}

	public function authenticate(){
		$username = $this->input->post("ra_username");
		$password = $this->input->post("ra_password");

		$userAdmin = new UserAdmin();

		$userAdmin->login($username, $password);

		print_r($this->session->userdata);

		if ($this->session->userdata) {
            redirect("admin/index");
        }else{
            redirect("admin/logout");
        }
	}

	function AdminSecurityCheck(){
		$UserAdmin = new UserAdmin();
		$user = $this->session->userdata('Mail');
		if ($user){
			return true;
		}else{
			return false;
		}
	}
}

?>