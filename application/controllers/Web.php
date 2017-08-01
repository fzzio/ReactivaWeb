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
		$this->load->model('Patient');

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
		if ($this->SecurityCheck()){

		$dataHeader['PageTitle'] = "Bienvenidos";

		$data['header'] = $this->load->view('web/header', $dataHeader);
		$data['menu'] = $this->load->view('web/menu', array());

		$data['contenido'] = $this->load->view('web/index', array());
		$data['page-footer'] = $this->load->view('web/page-footer', array());
		}else{
			redirect("web/login");
		}
	}

	public function pacientes(){
		if ($this->SecurityCheck()){

			$patients = Patient::getPatients();
			$dataContent['patients'] = $patients;

			$dataHeader['PageTitle'] = "Lista de pacientes";

		    $data['header'] = $this->load->view('web/header', $dataHeader);
		    $data['menu'] = $this->load->view('web/menu', array());

		    $data['contenido'] = $this->load->view('web/paciente-lista', $dataContent);
		    $data['patient-footer'] = $this->load->view('web/patient-footer', array());
		}else{
			redirect("web/login");
		}
	}


	public function paciente(){
		if ($this->SecurityCheck()){

			$id_paciente = $this->uri->segment(3);

			$paciente_obj = Patient::getPatientById($id_paciente);

			if(!is_null($paciente_obj)){
				$dataContent['paciente'] = $paciente_obj;

				$dataHeader['PageTitle'] = "Paciente";

			    $data['header'] = $this->load->view('web/header', $dataHeader);
			    $data['menu'] = $this->load->view('web/menu', array());

			    $data['contenido'] = $this->load->view('web/patient', $dataContent);
			    $data['patient-footer'] = $this->load->view('web/patient-footer', array());
			}else{
				redirect("web/pacientes");
			}

			
		}else{
			redirect("web/login");
		}
	}


   public function nuevoPaciente(){
   		if ($this->SecurityCheck()){
			$dataHeader['PageTitle'] = "Paciente";

		    $data['header'] = $this->load->view('web/header', $dataHeader);
		    $data['menu'] = $this->load->view('web/menu', array());

		    $data['contenido'] = $this->load->view('web/nuevopaciente', array());
		    $data['page-footer'] = $this->load->view('web/page-footer', array());

    	}else{
			redirect("web/login");
		}
  	}

  	public function editarPaciente(){
   		if ($this->SecurityCheck()){
			$dataHeader['PageTitle'] = "Paciente";

		    $data['header'] = $this->load->view('web/header', $dataHeader);
		    $data['menu'] = $this->load->view('web/menu', array());

		    $data['contenido'] = $this->load->view('web/editpaciente', array());
		    $data['page-footer'] = $this->load->view('web/page-footer', array());

    	}else{
			redirect("web/login");
		}
  	}

  public function calendar(){
  		if ($this->SecurityCheck()){
			$dataHeader['PageTitle'] = "Agenda";

			$data['header'] = $this->load->view('web/header', $dataHeader);
			$data['menu'] = $this->load->view('web/menu', array());

			$data['contenido'] = $this->load->view('web/calendar', array());
			$data['page-footer'] = $this->load->view('web/page-footer', array());
    	}else{
			redirect("web/login");
		}
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
		$username = $this->input->post("wa_username");
		$password = $this->input->post("wa_password");

		$userAdmin = new User();

		$userAdmin->login($username, $password);

		$user = $this->session->userdata('Group');

		if ($user){
			if ($user == 1 or $user ==2) {
            redirect("admin/login");
	        }else{
	        	if ($user == 3 or $user ==4){
	        		redirect("web/index");
	        	}else{
	        		redirect("web/logout");
	        	}
			}
		}else{
			redirect("web/login");
		}
	}

	function SecurityCheck(){
		$UserAdmin = new User();
		$user = $this->session->userdata('Group');
		if ($user == 3 or $user ==4){
			return true;
		}else{
			return false;
		}
	}	
	
	 /* Helpers ends*/
}