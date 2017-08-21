<?php 

if (!defined('BASEPATH')) exit ("No direct script access allowed");

class Admin extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->model('User');
		$this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		date_default_timezone_set("America/Guayaquil");
	}

	public function index() {
		if ($this->AdminSecurityCheck()) {
			$id_permission = 3;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);
			if ($grant_permission) {
				$dataHeader['PageTitle'] = "Reactiva";
        $data['header'] = $this->load->view('admin/header', $dataHeader);
        $data['menu'] = $this->load->view('admin/menu', array());
        $data['contenido'] = $this->load->view('admin/index', array());
        $data['footer'] = $this->load->view('admin/footer-gc', array());
			} else {
				redirect("admin/login");
			}    
		} else {
			redirect("admin/login");
		}
	}

	public function login() {
		if ($this->AdminSecurityCheck()) {
			redirect("admin/index");
		} else {
			$dataHeader['PageTitle'] = "Reactiva";
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['contenido'] = $this->load->view('admin/login', array());
			$data['footer'] = $this->load->view('admin/footer', array());
		}
	}

	public function logout() {
		if ($this->AdminSecurityCheck()) {
			$userAdmin = new User();
			$userAdmin->logout();
			redirect("admin/login");
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD account
	 * @return available accounts list
	 */
	public function accounts(){
		$debug = false;
		if ($this->AdminSecurityCheck()){
      //Initialize grocery_CRUD
      $titulo = "Usuario";
      $crud = new grocery_CRUD();
			$crud->set_table("account");
			$crud->set_subject($titulo);

			//Set display as
			$crud->display_as('name', 'Nombres');
			$crud->display_as('lastname', 'Apellidos');
			$crud->display_as('username', 'Usuario');
			$crud->display_as('email', 'Correo electrónico');
			$crud->display_as('password', 'Contraseña');
			$crud->display_as('last_ip', 'Última dirección IP');
			$crud->display_as('last_login', 'Visto por última vez');
			$crud->display_as('id_group', 'Grupo');
			$crud->display_as('status', 'Estado');

			//Permissions check
			$id_permission = 1;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);

			//Superadmin check. Grant access to all users
			if ($grant_permission) {
				$crud->set_relation('id_group', 'rbac_group', 'name');
			} else {
				$id_permission = 2;
				$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);
				//Only for admin. Limitation over group access
				if ($grant_permission) {
					$crud->where('account.id_group !=', 1);
					$crud->set_relation('id_group', 'rbac_group', 'name', array('id_group !=' => ' 1 '));
				}
			}

			//Set field type
			$crud->field_type('last_login', 'readonly');
			$crud->field_type('last_ip', 'readonly');
			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

			//Set validations rules
			$crud->set_rules('email', 'Correo electrónico', 'required|valid_email');
			$crud->set_rules('username', 'Usuario', 'required|alpha_numeric|is_unique[account.username]|max_length[25]');
			$crud->set_rules('password', 'Contraseña', 'alpha_numeric|min_length[4]');
			$crud->set_rules('id_group', 'Grupo', 'required');
			$crud->set_rules('state', 'Estado', 'required');

			$crud->set_rules('name', 'Nombres', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			$crud->set_rules('lastname', 'Apellidos', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			//Encrypt password
			$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
      $crud->callback_add_field('password',array($this,'set_password_input_to_empty'));
      $crud->field_type('password','password');
      $crud->callback_before_update(array($this,'encrypt_pw'));
      $crud->callback_before_insert(array($this,'encrypt_pw'));

      //Required fields
			$crud->columns('name', 'lastname', 'username', 'email', 'last_ip', 'last_login', 'id_group', 'status');
			$crud->fields('name', 'lastname', 'username', 'email', 'password', 'id_group', 'status');

			//Unset options
      $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
      $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD game_exercise
	 * @return available exercises list
	 */
	function exercises() {
			$debug = false;
			if ($this->AdminSecurityCheck()) {
				//Initialize grocery_CRUD
				$titulo = "Ejercicios";
	      $crud = new grocery_CRUD();
				$crud->set_table("game_exercise");
				$crud->set_subject( $titulo );

				//Set display as
				$crud->display_as('id_exercise' , 'ID Ejercicio');
				$crud->display_as('name' , 'Nombre');
				$crud->display_as('description' , 'Descripción');
				$crud->display_as('script_name' , 'Script Name');

				//Set field type
				$crud->field_type('description' , 'string');
				//Set Validation
				$crud->set_rules('script_name', 'Script Name', 'callback_extension', array(
								'extension' => 'El campo %s no tiene el formato correcto (script_name.js).'
						));

				$crud->set_rules('name', 'Nombre', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

				//Required fields
	      $crud->columns('id_exercise', 'name', 'description', 'script_name');
				$crud->fields('name', 'description', 'script_name');
				$crud->required_fields('name', 'description', 'script_name');

				//Unset options
				$crud->unset_export();
				$crud->unset_print();
				$crud->unset_read();

				//Grocery CRUD render
				$output = $crud->render();

				//Data header
				$dataHeader['PageTitle'] = $titulo;
				$dataHeader['css_files'] = $output->css_files;
				$dataFooter['js_files'] = $output->js_files;
				$dataContent['debug'] = $debug;

				//Loading from views
				$data['header'] = $this->load->view('admin/header', $dataHeader);
				$data['menu'] = $this->load->view('admin/menu', $dataHeader );
				$data['content'] = $this->load->view('admin/blank', $output);
				$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
			} else {
				redirect("admin/login");
			} 	
	}

	/**
	 * CRUD game_exercise_limb
	 * @return available games list
	 */
	public function games() {
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Initialize grocery_CRUD
			$titulo = 'Extremidades Asociadas a Ejercicios';
			$crud = new grocery_CRUD();
			$crud->set_table('game_exercise_limb');
			$crud->set_subject( $titulo );

			//Set display as
			$crud->display_as('id_game', 'Juego');
			$crud->display_as('id_limb', 'Extremidad');

			//Set field type
			//Set relation
			$crud->set_relation('id_game','game_exercise','name');
			$crud->set_relation('id_limb','game_limb','name');

			//Set validations rules
			$crud->set_rules('id_game', 'Juego', 'required');
			$crud->set_rules('id_limb', 'Extremidad', 'required');

			//Required fields
      $crud->columns('id_game', 'id_limb');
			$crud->fields('id_game', 'id_limb');
			//$crud->required_fields('id_game', 'id_limb');

			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}	

	/**
	 * CRUD game_limb
	 * @return available limbs list
	 */
	public function limbs(){
		$debug = false;
		if ($this->AdminSecurityCheck()){
			//Initialize grocery_CRUD
			$titulo = "Extremidades";
			$crud = new grocery_CRUD();
			$crud->set_table("game_limb");
			$crud->set_subject($titulo);

			//Set display as
			$crud->display_as('id_limb', 'ID Extremidad');
			$crud->display_as('name', 'Nombre');
			$crud->display_as('icon', 'Icono');
			$crud->display_as('description', 'Descripción');

			//Set field type
			$crud->set_field_upload('icon','assets/img/icons-exercise');
			$crud->field_type('description', 'string');

			//Set validations rules
			$crud->set_rules('icon', 'Icono', 'required');
			$crud->set_rules('name', 'Nombre', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			//Required fields
			$crud->columns('id_limb', 'name', 'icon', 'description');
			$crud->fields('name', 'icon', 'description');

			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD patient
	 * @return available patients list
	 */	
	public function patients(){
		$debug = false;
		if ($this->AdminSecurityCheck()){
			//Initialize grocery_CRUD
      $titulo = "Pacientes";
      $crud = new grocery_CRUD();
			$crud->set_table("patient");
			$crud->set_subject( $titulo );

			//Set display as
			$crud->display_as('id_patient', 'ID Paciente');
			$crud->display_as('ci', 'Cédula');
			$crud->display_as('name', 'Nombres');
			$crud->display_as('lastname', 'Apellidos');
			$crud->display_as('born', 'Fecha de Nacimiento');
			$crud->display_as('gender', 'Sexo');
			$crud->display_as('phone', 'Teléfono');
			$crud->display_as('cellphone', 'Celular');
			$crud->display_as('email', 'Correo electrónico');
			$crud->display_as('img', 'Foto');
			$crud->display_as('address', 'Domicilio');
			$crud->display_as('emergency_contact', 'Contacto emergencia');
			$crud->display_as('emergency_phone', 'Teléfono emergencia');
			$crud->display_as('blood', 'Tipo de sangre');
			$crud->display_as('rh', 'Factor RH');
			$crud->display_as('allergies_med', 'Alergias a medicamentos');
			$crud->display_as('allergies', 'Otras alergias');
			$crud->display_as('illness', 'Enfermedades');
			$crud->display_as('observations', 'Observaciones');

			//Set field type
			$crud->field_type('born', 'date');
			$crud->field_type('address', 'string');
			$crud->set_field_upload('img','assets\img\patient-profile');

			$crud->field_type('blood', 'dropdown', array(
                'O' => 'O',
                'A' => 'A',
                'B' => 'B',
                'AB' => 'AB'
            ));

			$crud->field_type('rh', 'dropdown', array(
                '+' => '+',
                '-' => '-'
            ));

			$crud->field_type('gender', 'dropdown', array(
                '0' => 'Femenino',
                '1' => 'Masculino'
            ));

			//Set validations rules
			$crud->set_rules('ci', 'Cedula', 'required|exact_length[10]|is_unique[patient.ci]');
			$crud->set_rules('phone', 'Telefono', 'required|exact_length[9]|numeric');
			$crud->set_rules('cellphone', 'Celular', 'required|exact_length[10]|numeric');
			$crud->set_rules('emergency_phone', 'Teléfono emergencia', 'required|exact_length[9]|numeric');
			$crud->set_rules('email', 'Correo', 'required|valid_email');
			$crud->set_rules('address', 'Domicilio', 'required');
			$crud->set_rules('blood', 'Tipo de sangre', 'required');
			$crud->set_rules('rh', 'Factor RH', 'required');
			$crud->set_rules('gender', 'Sexo', 'required');
		
			$crud->set_rules('name', 'Nombres', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			$crud->set_rules('lastname', 'Apellidos', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			$crud->set_rules('emergency_contact', 'Contacto emergencia', 'required|regex_match[/^([-a-z ])+$/i]', array(
								'regex_match' => 'El campo %s sólo puede contener carácteres alfabéticos.'
						));

			//Required fields
			$crud->columns('id_patient', 'ci', 'name', 'lastname', 'born', 'gender', 'phone', 'cellphone', 'email', 'img', 'address',  'emergency_contact', 'emergency_phone', 'blood', 'rh', 'allergies_med', 'allergies', 'illness', 'observations');
			$crud->fields('ci', 'name', 'lastname', 'born', 'gender', 'phone', 'cellphone', 'email', 'img', 'address', 'emergency_contact', 'emergency_phone', 'blood', 'rh', 'allergies_med', 'allergies', 'illness', 'observations');
			
			//Unset options
      $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			
			//Grocery CRUD render
			$output = $crud->render();
			
			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;
			
			//Loading from views
      $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}
		
	/**
	 * CRUD patient_consult
	 * @return available appointments list
	 */
	public function appointments(){
		$debug = false;
		if ($this->AdminSecurityCheck()){
			//Initialize grocery_CRUD
      $titulo = "Consultas";
      $crud = new grocery_CRUD();
			$crud->set_table("patient_consult");
			$crud->set_subject( $titulo );  

			//Set display as
			$crud->display_as('id_consult', 'ID Consulta');
			$crud->display_as('id_patient', 'Paciente');
			$crud->display_as('id_doctor_created', 'Doctor responsable');
			$crud->display_as('id_doctor_attended', 'Atendida por');
			$crud->display_as('date_created', 'Fecha de creación');
			$crud->display_as('date_planned', 'Fecha prevista');
			$crud->display_as('date_attended', 'Fecha de atención');
			$crud->display_as('status', 'Estado');
			$crud->display_as('diagnosis', 'Diágnostico');			
			$crud->display_as('observations', 'Observaciones');

			//Set relation
			$crud->set_primary_key('id_account','account_med');
			$crud->set_relation('id_patient','patient','{name} {lastname}');
			$crud->set_relation('id_doctor_created','account_med','{full_name}');
			$crud->set_relation('id_doctor_attended','account_med','{full_name}');

			//Set field type
			$crud->field_type('status', 'dropdown', array(
                '0' => 'Pendiente',
                '1' => 'Cancelado',
                '2' => 'Atendido'
            ));

			//Set validation
			$crud->set_rules('id_patient', 'Paciente', 'required');
			$crud->set_rules('id_doctor_created', 'Doctor responsable', 'required');
			$crud->set_rules('date_planned', 'Fecha prevista', 'required');
			$crud->set_rules('status', 'Estado', 'required');

			//Set before and afete callbacks
			$crud->change_field_type('date_created','hidden');
			$crud->callback_before_insert(array($this,'callback_insert'));

			//Required fields
			$crud->columns('id_consult', 'id_patient', 'id_doctor_created', 'id_doctor_attended',  'date_created', 'date_planned', 'date_attended', 'status', 'diagnosis', 'observations');
			$crud->fields('id_patient', 'id_doctor_created', 'id_doctor_attended', 'date_created', 'date_planned', 'date_attended', 'status', 'diagnosis', 'observations');

			//Unset options
      $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
      $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD patient_consult_limb
	 * @return available __list
	 */
	public function app_limbs(){
		$debug = false;
		if ($this->AdminSecurityCheck()){
			//Initialize grocery_CRUD
      $titulo = "Extremidades Asociadas a Consultas";
      $crud = new grocery_CRUD();
			$crud->set_table("patient_consult_limb");
			$crud->set_subject( $titulo );  

			//Set display as
			$crud->display_as('id_consult', 'ID Consulta');
			$crud->display_as('id_limb', 'Extremidad');

			//Set relation
			$crud->set_relation('id_consult','patient_consult','id_consult');
			$crud->set_relation('id_limb','game_limb','name');

			//Set field type
			//Set validations rules
			$crud->set_rules('id_consult', 'ID Consulta', 'required');
			$crud->set_rules('id_limb', 'Extremidad', 'required');

			//Required fields
			$crud->columns('id_consult', 'id_limb');
			$crud->fields('id_consult', 'id_limb');

			//Unset options
      $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
      $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD patient_therapy
	 * @return available therapies list
	 */
	public function therapies() {
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Initialize grocery_CRUD
			$titulo = "Terapias";
      $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy");
			$crud->set_subject( $titulo );

			//Set display as
			$crud->display_as('id_therapy', 'ID Terapia');
			$crud->display_as('id_patient', 'Paciente');
			$crud->display_as('date_created', 'Fecha de Creación');
			$crud->display_as('id_doctor_created', 'Doctor responsable');
			$crud->display_as('id_doctor_attended', 'Atendida por');
			$crud->display_as('eta', 'Inicio Estimado');
			$crud->display_as('etf', 'Fin Estimado');
			$crud->display_as('comment', 'Comentarios');
			$crud->display_as('sendmail', 'Envío de Correo');
			$crud->display_as('status', 'Estado');
			$crud->display_as('valoration', 'Valoración');
			$crud->display_as('time_elapse', 'Tiempo transcurrido');

			//Set field type
			$crud->field_type('date_created', 'datetime');
			$crud->field_type('status', 'dropdown', array(
                '0' => 'Pendiente',
                '1' => 'Cancelado',
                '2' => 'Atendido'
            ));
      $crud->field_type('sendmail', 'dropdown', array(
                '0' => 'No',
                '1' => 'Si'
            ));

      $crud->field_type('valoration', 'dropdown', array(
                '0' => 'No necesita acompañamiento',
                '1' => 'Acompañamiento medio',
                '2' => 'Necesita acompañamiento'
            ));

      $crud->field_type('time_elapse', 'dropdown', array(
                '00:05:00' => '00:05:00 (5 minutos)',
                '00:10:00' => '00:10:00 (10 minutos)',
                '00:15:00' => '00:15:00 (15 minutos)',
                '00:30:00' => '00:30:00 (30 minutos)',
                '00:40:00' => '00:40:00 (40 minutos)',
                '00:50:00' => '00:50:00 (50 minutos)',
                '01:00:00' => '01:00:00 (1 hora)'
            ));

			//Set relation
			$crud->set_primary_key('id_account','account_med');
			$crud->set_relation('id_patient', 'patient', '{name} {lastname}');
			$crud->set_relation('id_doctor_created', 'account_med', 'full_name');
			$crud->set_relation('id_doctor_attended', 'account_med', 'full_name');
			$crud->set_relation('id_consulta', 'patient_consult', 'id_consult');

			//Set validations rules
			$crud->set_rules('id_patient', 'Paciente', 'required');
			$crud->set_rules('id_doctor_created', 'Doctor responsable', 'required');
			$crud->set_rules('id_doctor_attended', 'Atendida por', 'required');
			$crud->set_rules('eta', 'Inicio Estimado', 'required');
			$crud->set_rules('etf', 'Fin Estimado', 'required');
			$crud->set_rules('sendmail', 'Envío de Correo', 'required');
			$crud->set_rules('status', 'Estado', 'required');
			
			//Set before and afete callbacks
			$crud->change_field_type('date_created','hidden');
			$crud->callback_before_insert(array($this,'callback_insert'));

			//Required fields
			$crud->columns('id_therapy', 'id_patient', 'date_created', 'id_doctor_created','id_doctor_attended','eta', 'etf', 'sendmail','status', 'time_elapse', 'valoration', 'comment');
			$crud->fields('id_patient', 'date_created', 'id_doctor_created','id_doctor_attended','eta', 'etf', 'sendmail','status', 'time_elapse', 'valoration', 'comment');
			
			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			
			//Grocery CRUD render
			$output = $crud->render();
			
			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;
			
			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}	 	
	}	
	
	/**
	 * CRUD patient_therapy_comment
	 * @return available comments list
	 */
	public function comments() {
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Initialize grocery_CRUD
			$titulo = "Comentarios Asociados a Terapias";
      $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy_comment");
			$crud->set_subject($titulo);

			//Set display as
			$crud->display_as('id_therapy', 'ID Terapia');
			$crud->display_as('date', 'Fecha');
			$crud->display_as('msg', 'Comentario');

			//Set field type
			$crud->field_type('date', 'datetime');
			$crud->field_type('msg', 'string');

			//Set relation
			$crud->set_primary_key('id_account','account_med');
			$crud->set_relation('id_therapy', 'patient_therapy', 'id_therapy');
			
			//Set validations rules
			$crud->set_rules('id_therapy', 'ID Terapia', 'required');
			$crud->set_rules('msg', 'Comentario', 'required');

			//Set before and afete callbacks
			$crud->change_field_type('date','hidden');
			$crud->callback_before_insert(array($this,'callback_current_date'));

			//Required fields
			$crud->columns('id_therapy', 'date', 'msg');
			$crud->fields('id_therapy', 'date', 'msg');

			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			//Grocery CRUD render
			$output = $crud->render();

			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}	 	
	}	

	/**
	 * CRUD patient_therapy_exer
	 * @return available exercises list
	 */
	public function th_exercises() {
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Initialize grocery_CRUD
			$titulo = "Ejercicios Asociados a Terapias";
      $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy_exer");
			$crud->set_subject($titulo);
			//Set display as
			$crud->display_as('id_therapy', 'ID Terapia');
			$crud->display_as('id_exercise', 'Ejercicio');
			$crud->display_as('difficulty', 'Dificultad');
			$crud->display_as('param0', 'Parámetro 1');
			$crud->display_as('param1', 'Parámetro 2');
			$crud->display_as('duration', 'Duración');
			//Set field type
			$crud->field_type('difficulty', 'dropdown', array(
                '0' => 'Fácil',
                '1' => 'Medio',
                '2' => 'Difícil'
            ));
			$crud->field_type('duration', 'dropdown', array(
                '00:05:00' => '00:05:00 (5 minutos)',
                '00:10:00' => '00:10:00 (10 minutos)',
                '00:15:00' => '00:15:00 (15 minutos)',
                '00:30:00' => '00:30:00 (30 minutos)',
                '00:40:00' => '00:40:00 (40 minutos)',
                '00:50:00' => '00:50:00 (50 minutos)',
                '01:00:00' => '01:00:00 (1 hora)'
            ));
			//Set relation
			$crud->set_relation('id_therapy', 'patient_therapy', 'id_therapy');
			$crud->set_relation('id_exercise', 'game_exercise', 'name');
			
			//Set validations rules
			$crud->set_rules( 'id_therapy' , 'ID Terapia', 'required');
			$crud->set_rules( 'id_exercise' , 'Ejercicio', 'required');
			$crud->set_rules( 'difficulty' , 'Dificultad', 'required');
			$crud->set_rules( 'duration' , 'Duración', 'required');
			//Required fields
			$crud->columns('id_therapy', 'id_exercise', 'difficulty', 'param1', 'param0', 'duration');
			$crud->fields('id_therapy', 'id_exercise', 'difficulty', 'param1', 'param0', 'duration');
	
			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			//Grocery CRUD render
			$output = $crud->render();
			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;
			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}	 	
	}	

	/**
	 * CRUD patient_therapy_photo
	 * @return available photos list
	 */
	public function photos() {
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Initialize grocery_CRUD
			$titulo = 'Fotos de Terapias';
			$crud = new grocery_CRUD();
			$crud->set_table('patient_therapy_photo');
			$crud->set_subject( $titulo );
			//Set display as
			$crud->display_as('id_therapy', 'ID Terapia');
			$crud->display_as('date', 'Fecha');
			$crud->display_as('img', 'Imagen');
			$crud->display_as('comment', 'Comentario');
			//Set field type
			$crud->set_field_upload('img','assets/uploads/therapy_photo');
			//Set relation
			$crud->set_relation('id_therapy','patient_therapy','id_therapy');
			
			//Set validations rules
			$crud->set_rules('id_therapy', 'ID Terapia', 'required');
			$crud->set_rules('img', 'Imagen', 'required');
			$crud->set_rules('comment', 'Comentario', 'required');
			//Set before and afete callbacks
			$crud->change_field_type('date','hidden');
			$crud->callback_before_insert(array($this,'callback_current_date'));

			//Required fields
      $crud->columns('id_therapy', 'date', 'img', 'comment');
			$crud->fields('id_therapy', 'date', 'img', 'comment');
			//Unset options
			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();
			//Grocery CRUD render
			$output = $crud->render();
			//Data header
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;
			//Loading from views
			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );
			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		} else {
			redirect("admin/login");
		}
	}

	/**
	 * CRUD contact
	 * @return available contacts list
	 */
	public function contacts(){
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			//Permissions check
			$id_permission = 10;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);
			if($grant_permission){
				//Initialize grocery_CRUD
				$titulo = 'Contactos';
				$crud = new grocery_CRUD();
				$crud ->set_table('web_contact');
				$crud -> set_subject($titulo);
				//Set display as
				$crud->display_as('date' , 'Fecha');
				$crud->display_as('name' , 'Nombre del contacto');
				$crud->display_as('message' , 'Mensaje' );
				$crud->display_as('email' , 'Correo');
				//Set validations rules
				//$crud -> set_rules('name', 'Nombre de Contacto','alpha');
				$crud -> set_rules('email','Correo','valid_email');
				//Required fields
				$crud -> columns('date','name','email','message');
				$crud -> fields('date','name','email','message');
				$crud -> required_fields('date','name','email','message');
				//Unset options
				$crud->unset_add();
				$crud->unset_edit();
				$crud->unset_export();
				$crud->unset_print();
				$crud->unset_read();
				//Grocery CRUD render
				$output = $crud->render();
				//Data header
				$dataHeader['PageTitle'] = $titulo;
				$dataHeader['css_files'] = $output->css_files;
				$dataFooter['js_files'] = $output->js_files;
				$dataContent['debug'] = $debug;
				//Loading from views
	      $data['header'] = $this->load->view('admin/header', $dataHeader);
				$data['menu'] = $this->load->view('admin/menu', $dataHeader );
				$data['content'] = $this->load->view('admin/blank', $output);
				$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
			} else {
				redirect("admin/index");
			}
		} else {
			redirect("admin/login");
		}
	}

	function AdminSecurityCheck() {
		$UserAdmin = new User();
		$user = $this->session->userdata('Group');
		//Only gets admin and superadmin
		if ($user == 1 or $user ==2){
			return true;
		} else {
			return false;
		}
	}	

	public function authenticate() {
		$username = $this->input->post("ra_username");
		$password = $this->input->post("ra_password");

		$userAdmin = new User();

		$userAdmin->login($username, $password);

		$user = $this->session->userdata('Group');

		if ($user == 1 or $user ==2){
            redirect("admin/index");
        }else{
            redirect("admin/logout");
        }
	}

	public function encrypt_pw($post_array) {
		if (!empty($post_array['password'])) {
            $post_array['password'] = md5($_POST['password']);
        } else {
        	unset($post_array['password']);
        }
        return $post_array;
	}

	public function set_password_input_to_empty() {
		return "<input type='password' name='password' value='' />";
	}

	public function extension($str) {
		$ext = pathinfo($str, PATHINFO_EXTENSION);
		return ($ext == "js");
	}

	public function callback_insert($post_array) {
	  $post_array['date_created'] = date('Y-m-d H:i:s');
	  return $post_array;
	}

	public function callback_current_date($post_array) {
	  $post_array['date'] = date('Y-m-d H:i:s');
	  return $post_array;
	}

	public function check_dates($fecha2, $fecha1) {
		$partes = explode('/', $this->input->post('fecha1'));
		$fecha1 = join('-', $partes);

		$partes2 = explode('/', $this->input->post('fecha2'));
		$fecha2 = join('-', $partes2);

	  if ($fecha2 >= $fecha1) {
		  return TRUE;
	 	} else {
	 			$this->form_validation->set_message('check_dates', "La fecha de inicio no puede ser posterior a la fecha de finalización.");
	 			return FALSE;
	  }
	}

	/*//Realizar corrección
	public function date_valid ($born) {
		$partes = explode('/', $this->input->post('born'));
		$fecha = join('-', $partes);
		$temp = date("d-m-Y", $fecha);
		$current = date("d-m-Y");
		return ($fecha < $current);
	}*/

	/*public function check_dates($fecha2, $fecha1){
		if ($fecha2 > $fecha1){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_dates', "La fecha de inicio no puede ser posterior a la fecha de finalización.");
			return FALSE;
		}
	}*/

}

?>