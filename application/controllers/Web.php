<?php

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Web extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
		$this->load->library('pagination');
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

			$config = array();
			$config["base_url"] = site_url() . "/web/pacientes";
			$config["total_rows"] = $this->Patient->record_count();
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			$config['num_links'] = 5;
   			$config['prev_link'] = "<span class = 'glyphicon glyphicon-chevron-left ml-5'></span>";
   			$config['next_link'] = "<span class = 'glyphicon glyphicon-chevron-right ml-5'></span>";
   			$config['cur_tag_open'] = "<b class = 'ml-5'>";
   			$config['cur_tag_close'] = '</b>';
   			$config['num_tag_open'] = "<a class = 'ml-5'>";
   			$config['num_tag_close'] = '</a>';
   			$config['full_tag_open'] = "<div class = 'pag-nav'>";
   			$config['full_tag_close'] = '</div>';

			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$dataContent["results"] = $this->Patient->fetch_patients($config["per_page"], $page);
       		$dataContent["links"] = $this->pagination->create_links();


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
   			
   			$id_paciente = $this->uri->segment(3);

			$paciente_obj = Patient::getPatientById($id_paciente);

			if(!is_null($paciente_obj)){
				$dataContent['paciente'] = $paciente_obj;

				$dataHeader['PageTitle'] = "Paciente";

			    $data['header'] = $this->load->view('web/header', $dataHeader);
			    $data['menu'] = $this->load->view('web/menu', array());

			    $data['contenido'] = $this->load->view('web/editpaciente', $dataContent);
			    $data['page-footer'] = $this->load->view('web/page-footer', array());
		    }else{
				redirect("web/pacientes");
			}
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
	/*FORM UPLOAD STARTS*/
	public function newPatient(){
  		//Start upload config
		$config['upload_path']          = 'assets/uploads/dishes/';
        $config['allowed_types']        = 'gif|jpeg|jpg|png|tiff';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']			= TRUE;
        $config['remove_spaces']		= TRUE;
        $config['detect_mime']			= TRUE;
        //End config upload

        $img = "";

        $name = $this->input->post("pax-name");
        $lastname = $this->input->post("pax-lastname");
        $ci = $this->input->post("pax-ci");
        $dd_born = $this->input->post("pax-born-dd");
        $mm_born = $this->input->post("pax-born-mm");
        $yy_born =$this->input->post("pax-born-yy");
        $phone = $this->input->post("pax-phone");
        $cellphone = $this->input->post("pax-cellphone");
        $mail = $this->input->post("pax-mail");
        $address = $this->input->post("pax-address");
        $gender = $this->input->post("pax-gender");
        $blood = $this->input->post("pax-blood");
        $rh = $this->input->post("pax-rh");
        $allergies = $this->input->post("pax-allergies");
        $illness = $this->input->post("pax-illness");
        $observations = $this->input->post("pax-observation");
        $img = $this->input->post("pax-photo");

        $this->load->library('upload', $config);

        if($this->upload->do_upload("pax-photo")) {
            $img_data = $this->upload->data();
            $img = $img_data["file_name"];
        }

        $data = array(
        	'ci'=>$ci,
        	'name'=>$name,
        	'lastname'=>$lastname,
        	'born'=>$yy_born.'-'.$mm_born.'-'.$dd_born,
        	'gender'=>$gender,
        	'phone'=>$phone,
        	'cellphone'=>$cellphone,
        	'address'=>$address,
        	'blood'=>$blood,
        	'rh'=>$rh,
        	'allergies'=>$allergies,
        	'observations'=>$observations,
        	'illness'=>$illness,
        	'img'=>$img,
        	'email'=>$mail,
        	);

        $this->db->insert('patient', $data);
        $id_patient = $this->db->insert_id();

        redirect("web/paciente/".$id_patient);

  	}

  	public function editPatient(){
  		//Start upload config
		$config['upload_path']          = 'assets/uploads/dishes/';
        $config['allowed_types']        = 'gif|jpeg|jpg|png|tiff';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']			= TRUE;
        $config['remove_spaces']		= TRUE;
        $config['detect_mime']			= TRUE;
        //End config upload

        $img = "";

        $id_patient = $this->input->post("pax-id");
        $name = $this->input->post("pax-name");
        $lastname = $this->input->post("pax-lastname");
        $ci = $this->input->post("pax-ci");
        $dd_born = $this->input->post("pax-born-dd");
        $mm_born = $this->input->post("pax-born-mm");
        $yy_born =$this->input->post("pax-born-yy");
        $phone = $this->input->post("pax-phone");
        $cellphone = $this->input->post("pax-cellphone");
        $mail = $this->input->post("pax-mail");
        $address = $this->input->post("pax-address");
        $gender = $this->input->post("pax-gender");
        $blood = $this->input->post("pax-blood");
        $rh = $this->input->post("pax-rh");
        $allergies = $this->input->post("pax-allergies");
        $illness = $this->input->post("pax-illness");
        $observations = $this->input->post("pax-observation");
        $img = $this->input->post('dish-prev-img');


        if (!is_null($img)){
			$strip_foto = explode("/", $img);
			$img = $strip_foto[7];
		}

        $this->load->library('upload', $config);

        if($this->upload->do_upload("pax-photo")) {
            $img_data = $this->upload->data();
            $img = $img_data["file_name"];
        }

        $data = array(
        	'ci'=>$ci,
        	'name'=>$name,
        	'lastname'=>$lastname,
        	'born'=>$yy_born.'-'.$mm_born.'-'.$dd_born,
        	'gender'=>$gender,
        	'phone'=>$phone,
        	'cellphone'=>$cellphone,
        	'address'=>$address,
        	'blood'=>$blood,
        	'rh'=>$rh,
        	'allergies'=>$allergies,
        	'observations'=>$observations,
        	'illness'=>$illness,
        	'img'=>$img,
        	'email'=>$mail,
        	);

        $this->db->where('patient.id_patient', $id_patient);
		$this->db->update('patient', $data);

        redirect("web/paciente/".$id_patient);
  	}

	/*FORM UPLOAD ENDS*/


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