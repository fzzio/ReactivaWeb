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
		$this->load->model('Calendar');
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

		$menuContent['selection']="None";

		$data['header'] = $this->load->view('web/header', $dataHeader);
		$data['menu'] = $this->load->view('web/menu', $menuContent);

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

       		$menuContent['selection']="patient";

			$dataHeader['PageTitle'] = "Lista de pacientes";

		    $data['header'] = $this->load->view('web/header', $dataHeader);
		    $data['menu'] = $this->load->view('web/menu', $menuContent);

		    $data['contenido'] = $this->load->view('web/paciente-lista', $dataContent);
		    $data['footer'] = $this->load->view('web/page-footer', array());
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

				$menuContent['selection']="patient";

			    $data['header'] = $this->load->view('web/header', $dataHeader);
			    $data['menu'] = $this->load->view('web/menu', $menuContent);

			    $data['contenido'] = $this->load->view('web/patient', $dataContent);
			    $data['page-footer'] = $this->load->view('web/page-footer', array());
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

			$menuContent['selection']="patient";

		    $data['header'] = $this->load->view('web/header', $dataHeader);
		    $data['menu'] = $this->load->view('web/menu', $menuContent);

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
				$menuContent['selection']="patient";

				$dataContent['paciente'] = $paciente_obj;

				$dataHeader['PageTitle'] = "Paciente";

			    $data['header'] = $this->load->view('web/header', $dataHeader);
			    $data['menu'] = $this->load->view('web/menu', $menuContent);

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
				$menuContent['selection']="calendar";

				$dataHeader['PageTitle'] = "Agenda";

				$dataContent['controller']=$this;

				$data['header'] = $this->load->view('web/header', $dataHeader);
				$data['menu'] = $this->load->view('web/menu', $menuContent);

				$data['contenido'] = $this->load->view('web/calendar', $dataContent);
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
        $emergencycontact = $this->input->post("pax-emergencycontact");
        $emergencyphone = $this->input->post("pax-emergencyphone");
        $option_med = $this->input->post("pax-option-med");
        $option_other = $this->input->post("pax-option-other");
        $allergies_med = $this->input->post("pax-med-allergies");

        $this->load->library('upload', $config);

        if($option_med == "-"){
        	$allergies_med = NULL;
        }

        if($option_other == "-"){
        	$allergies = NULL;
        }

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
        	'allergies_med'=>$allergies_med,
        	'emergency_contact'=>$emergencycontact,
        	'emergency_phone'=>$emergencyphone
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

        $emergencycontact = $this->input->post("pax-emergencycontact");
        $emergencyphone = $this->input->post("pax-emergencyphone");
        $option_med = $this->input->post("pax-option-med");
        $option_other = $this->input->post("pax-option-other");
        $allergies_med = $this->input->post("pax-med-allergies");

        if (!is_null($img)){
			$strip_foto = explode("/", $img);
			$img = $strip_foto[7];
		}

		if($option_med == "-"){
        	$allergies_med = NULL;
        }

        if($option_other == "-"){
        	$allergies = NULL;
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
        	'allergies_med'=>$allergies_med,
        	'emergency_contact'=>$emergencycontact,
        	'emergency_phone'=>$emergencyphone
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

	 /*CALENDAR FUNCTIONS START*/

	public function eventGet(){
		$event_post = $this->input->post();
		if(!empty($event_post)){
			if($event_post['func'] == 'getCalender'){
				$this->getCalender($event_post['year'],$event_post['month']);
			}else{
				if ($event_post['func'] == 'getEvents'){
					$this->getEvents($event_post['date']);
				}
			}	
			
				
		}
	}

	public function getEvents($date = ''){
		$eventListHTML = '';

		//Get events based on the current date
		$result =  Calendar::getDayEvents($date);
		if(count($result) > 0){
			$eventListHTML = '<h2>'.date("d M Y",strtotime($date)).'</h2>';
			$eventListHTML .= '<ul  class="list-unstyled" >';
			foreach($result as $row){
				$eventListHTML .= 
				"<li class='item-agenda mb-10 pl-10 pr-10'> 
					<div class = 'row'>
						<div class = 'col-xs-6'>
							<span class = 'agenda-label'>Paciente:</span> ".$row['fullname']."
						</div>
						<div class = 'col-xs-6'>
							<span class = 'agenda-label'>Horario:</span> ".$row['hour']."
						</div>
					</div>
				</li>

				

				";
			}
			$eventListHTML .= "</ul>

			<button  type='button' class='btn btn-nuevo mt-10' data-toggle='modal' data-target='#myModal'>
				<div class = 'glyphicon-ring'>
					<span class='glyphicon glyphicon-plus glyphicon-bordered' ></span>
				</div>
				AGENDAR NUEVA CITA
			</button >
			";
		}else{
			$eventListHTML .= '<h2>'.date("d M Y",strtotime($date)).'</h2>';
			$eventListHTML .= '<p> No hay citas</p>';
			$eventListHTML .= "<button  type='button' class='btn btn-nuevo mt-10' data-toggle='modal' data-target='#myModal'>
				<div class = 'glyphicon-ring'>
					<span class='glyphicon glyphicon-plus glyphicon-bordered' ></span>
				</div>
				AGENDAR NUEVA CITA
			</button >";
		}
		
		echo $eventListHTML;
	}


	public function getCalender($year = '',$month = ''){
		$CI =& get_instance();
		$dateYear = ($year != '')?$year:date("Y");
		$dateMonth = ($month != '')?$month:date("m");
		$date = $dateYear.'-'.$dateMonth.'-01';
		$currentMonthFirstDay = date("N",strtotime($date));
		$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
		$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
		$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
	?>

		<div class = 'row'>
			<div class = 'col-md-6 col-xs-12'>
				<div class = 'mon-header pt-50'>
		        	<a  onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">
		        		<span class = 'glyphicon glyphicon-chevron-left'></span>
		        	</a>
		            <span class = 'mr-15 ml-15'><?php echo date("F", mktime(0, 0, 0, $dateMonth, 10)); ?></span>
		            <a  onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">
		            	<span class = 'glyphicon glyphicon-chevron-right'></span>
		            </a>
		        </div>
				<div id="calender_section_top">
					<ul>
						<li>Dom</li>
						<li>Lun</li>
						<li>Mar</li>
						<li>Mie</li>
						<li>Jue</li>
						<li>Vie</li>
						<li>Sab</li>
					</ul>
				</div>
				<div id="calender_section_bot">
					<ul>
					<?php 
						$dayCount = 1; 
						for($cb=1;$cb<=$boxDisplay;$cb++){
							if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
								//Current date
								$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
								$eventNum = 0;
								//Get number of events based on the current date
								$eventNum =  Calendar::getCountDay($currentDate);
								//Define date cell color
								if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
									echo '<li date="'.$currentDate.'" class="grey date_cell">';
									echo '<a onclick="getEvents(\''.$currentDate.'\');">';
									echo '<span >';
									echo $dayCount;
									echo '</span>';	
									echo '</a>';	
								}elseif($eventNum > 0){
									echo '<li date="'.$currentDate.'" class="date_cell">';
									echo '<a onclick="getEvents(\''.$currentDate.'\');" class = "round-day">';
									echo '<div class="event-mark">';
									echo $dayCount;
									echo '</div>';	
									echo '<div class="event-counter">';
									echo $eventNum;
									echo '</div>';
									echo '</a>';
								}else{
									echo '<li date="'.$currentDate.'" class="date_cell">';
									echo '<a onclick="getEvents(\''.$currentDate.'\');">';
									echo '<span >';
									echo $dayCount;
									echo '</span>';	
									echo '</a>';	
								}				
								
								
								echo '</li>';
								$dayCount++;
					?>
					<?php }else{ ?>
						<li><span>&nbsp;</span></li>
					<?php } } ?>
					</ul>
				</div>
			</div>
			<div class = 'col-md-6'>
				<div id="event_list" class="pt-50">
						
				</div>
				
			</div>
		</div>
	<?php
	}

	 /*CALENDAR FUNCTIONS ENDS*/
}

?>