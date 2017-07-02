<?php

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Web extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->model('User');
		$this->load->model('Therapy');

		date_default_timezone_set("America/Guayaquil");
	}

	public function login(){
		if ($this->SecurityCheck()){
			 redirect("web/index");
		}else{
			$dataHeader['PageTitle'] = "Login";

			$data['header'] = $this->load->view('web/header', $dataHeader);

        	$data['contenido'] = $this->load->view('web/login', array());
        	$data['footer'] = $this->load->view('web/footer', array());
        }
	}

	public function index(){
		$dataHeader['PageTitle'] = "Bienvenidos";

	  $data['header'] = $this->load->view('web/header', $dataHeader);
	  $data['menu'] = $this->load->view('web/menu', array());

	  $data['contenido'] = $this->load->view('web/index', array());
	  $data['page-footer'] = $this->load->view('web/page-footer', array());
  }

  public function patient(){
		$dataHeader['PageTitle'] = "Paciente";

    $data['header'] = $this->load->view('web/header', $dataHeader);
    $data['menu'] = $this->load->view('web/menu', array());

    $data['contenido'] = $this->load->view('web/patient', array());
    $data['page-footer'] = $this->load->view('web/page-footer', array());
  }

	public function logout(){
		if ($this->SecurityCheck()){
			$userAdmin = new User();
			$userAdmin->logout();
			redirect("web/login");
		}else{
			redirect("web/login");
		}
	}

	 /* Helpers starts*/

	 public function authenticate(){
		$username = $this->input->post("ra_username");
		$password = $this->input->post("ra_password");

		$userAdmin = new User();

		$userAdmin->login($username, $password);

		$user = $this->session->userdata('Group');
		if ($user){
			if ($user == 3) {
            redirect("web/user");
	        }else{
	        	if ($user == 2){
	        		redirect("web/assistant");
	        	}else{
	        		if ($user == 1){
	        			 redirect("admin/logout");
	        		}
	        	}
			}
		}else{
			redirect("web/login");
		}
	}

	function SecurityCheck(){
		$UserAdmin = new User();
		$user = $this->session->userdata('Group');
		if ($user){
			return true;
		}else{
			return false;
		}
	}	
	
	 /* Helpers ends*/
}