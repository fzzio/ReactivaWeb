<?php 

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Admin extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->model('User');
		$this->load->model('Geography_model');
		$this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		
		
		date_default_timezone_set("America/Guayaquil");
	}

	public function index(){
		if ($this->AdminSecurityCheck()){

			$id_permission = 3;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);
			if($grant_permission){
				$dataHeader['PageTitle'] = "Reactiva";

	            $data['header'] = $this->load->view('admin/header', $dataHeader);
	            $data['menu'] = $this->load->view('admin/menu', array());

	            $data['contenido'] = $this->load->view('admin/index', array());
	            $data['footer'] = $this->load->view('admin/footer-gc', array());
			}else{
				redirect("admin/login");
			}
      
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
			$userAdmin = new User();
			$userAdmin->logout();
			redirect("admin/login");
		}else{
			redirect("admin/login");
		}
	}


	/* CRUD Starts*/

	/**
	 * CRUD de todas las cuentas disponibles para el sistema
	 */
	public function accounts(){
		$debug = false;

		if ($this->AdminSecurityCheck()){

            $titulo = "Usuario";

            $crud = new grocery_CRUD();
			$crud->set_table("account");
			$crud->set_subject( $titulo );

			$id_permission = 2;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);

			//Only for admin. Limitation over group access
			if($grant_permission){
				$crud->where('id_group !=', 1);
			}


			$crud->display_as( 'name' , 'Nombres' );
			$crud->display_as( 'lastname' , 'Apellidos' );
			$crud->display_as( 'username' , 'Usuario' );
			$crud->display_as( 'email' , 'Correo' );
			$crud->display_as( 'password' , 'Contraseña' );
			$crud->display_as( 'last_ip' , 'Última IP' );
			$crud->display_as( 'last_login' , 'Última Conexión' );
			$crud->display_as( 'id_group' , 'Grupo' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

            $crud->set_relation('id_group', 'rbac_group', 'name');

			$crud->field_type('last_login', 'readonly');
			$crud->field_type('last_ip', 'readonly');

			$crud->set_rules('name', 'Nombres', 'required|alpha');
			$crud->set_rules('lastname', 'Apellidos', 'required|alpha');
			$crud->set_rules('email', 'Correo', 'required|valid_email');

			$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
            $crud->callback_add_field('password',array($this,'set_password_input_to_empty'));

            $crud->field_type('password','password');

            $crud->callback_before_update(array($this,'encrypt_pw'));
            $crud->callback_before_insert(array($this,'encrypt_pw'));

			$crud->columns( 'name', 'lastname', 'username', 'email', 'last_ip', 'last_login', 'id_group', 'status' );
			$crud->fields( 'name', 'lastname', 'username', 'email', 'password', 'id_group','status');
			$crud->required_fields( 'name', 'lastname', 'username', 'email', 'id_group','status'  );

            $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			$output = $crud->render();

			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

            $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );

			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		}else{
			redirect("admin/login");
		}
	}


	public function contactos(){
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			$id_permission = 10;
			$grant_permission = User::getPermission($this->session->userData('ID'), $id_permission);
			if($grant_permission){
				$titulo = 'Contactos';
				$crud = new grocery_CRUD();
				$crud ->set_table('web_contact');
				$crud -> set_subject($titulo);

				$crud->unset_add();
				$crud->unset_edit();

				$crud->display_as( 'date' , 'Fecha de contacto' );
				$crud->display_as( 'name' , 'Nombre del contacto' );
				$crud->display_as( 'message' , 'Mensaje' );
				$crud->display_as( 'email' , 'Correo' );

				$crud -> display_as('date', 'Fecha');
				//tocara hacer la expresion regular para que acepte alpha y espacio
				//$crud -> set_rules('name', 'Nombre de Contacto','alpha');
							
				$crud -> set_rules('email','Correo','valid_email');
				
				$crud -> columns('date','name','email','message');
				$crud -> fields('date','name','email','message');
				$crud -> required_fields('date','name','email','message');
				$crud->unset_export();
				$crud->unset_print();
				$crud->unset_read();

				$output = $crud->render();

				$dataHeader['PageTitle'] = $titulo;
				$dataHeader['css_files'] = $output->css_files;
				$dataFooter['js_files'] = $output->js_files;
				$dataContent['debug'] = $debug;

	            $data['header'] = $this->load->view('admin/header', $dataHeader);
				$data['menu'] = $this->load->view('admin/menu', $dataHeader );

				$data['content'] = $this->load->view('admin/blank', $output);
				$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
			}else{
				redirect("admin/index");
			}
		}else{
			redirect("admin/login");
		}
	}


	/**
	 * CRUD de todas las terapias
	 * @return una lista con todas las terapias disponibles
	 */
	public function terapias() {
		$debug = false;

		if ($this->AdminSecurityCheck()) {
			$titulo = "Terapias";

            $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy");
			$crud->set_subject( $titulo );

			$crud->display_as( 'id_patient' , 'Paciente' );
			$crud->display_as( 'id_doctor_created' , 'Doctor que creó la cita' );
			$crud->display_as( 'id_doctor_attended' , 'Doctor que la atendió' );
			$crud->display_as( 'date_create' , 'Fecha de Creación' );
			$crud->display_as( 'eta' , 'Inicio Estimado' );
			$crud->display_as( 'etf' , 'Fin Estimado' );
			$crud->display_as( 'starttime' , 'Hora Inicio' );
			$crud->display_as( 'finishtime' , 'Hora Fin' );
			$crud->display_as( 'comment' , 'Comentarios' );
			$crud->display_as( 'sendmail' , 'Envío de Correo' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->set_primary_key('id_account','account_med');
			$crud->set_relation('id_patient', 'patient', '{name} {lastname}');
			$crud->set_relation('id_doctor_created', 'account_med', 'full_name');
			$crud->set_relation('id_doctor_attended', 'account_med', 'full_name');

			$crud->field_type('date_create', 'readonly');

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Pendiente',
                '1' => 'Cancelado',
                '2' => 'Atendido'
            ));

            $crud->field_type('sendmail', 'dropdown', array(
                '0' => 'No',
                '1' => 'Si'
            ));

            $crud->columns( 'id_patient', 'id_doctor_created','id_doctor_attended','date_create','eta', 'etf',  'comment', 'sendmail','status' );
			$crud->fields('id_patient', 'id_doctor_created','id_doctor_attended','eta', 'etf', 'comment', 'sendmail','status' );
			$crud->required_fields('etf', 'eta', 'id_patient','status', 'id_doctor_created');

			$crud->set_rules('etf','Fecha de Finalización','callback_check_dates[eta]');

			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			$output = $crud->render();
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );

			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);


		}else{
			redirect("admin/login");
		}
		 	
	}

	public function terapia_foto() {
		$debug = false;

		if ($this->AdminSecurityCheck()) {
			$titulo = 'Fotos de Terapias';

            $crud = new grocery_CRUD();
			$crud->set_table('patient_therapy_photo');

			//$crud->set_relation_n_n('Paciente','patient_therapy_photo','patient_therapy','id_patient','id_patient','name');

			$crud->set_subject( $titulo );

			$crud->display_as( 'id_therapy' , 'Terapia' );
			$crud->display_as( 'img' , 'Imagen' );
			$crud->set_field_upload('img','assets/uploads',"jpg|png|jpeg|bmp");
			
			$crud->display_as( 'comment' , 'Comentario' );

			//$crud->set_relation('id_therapy','patient_therapy_list','{full_name} {eta}');
			$crud->set_relation('id_therapy','patient_therapy','{id_therapy} {date_created}');
			$crud->set_primary_key('id_therapy, eta','patient_therapy_list');

            $crud->columns('id_therapy', 'img', 'comment' );
			$crud->fields('id_therapy', 'img', 'comment' );
			$crud->required_fields('id_therapy', 'img', 'comment');


			$crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			$output = $crud->render();
			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

			$data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );

			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);


		}else{
			redirect("admin/login");
		}
		 	
	}


	/**
	 * CRUD de la tabla game_exercise
	 * @return lista con todos los ejercicios
	 */
	function exercises() {
			$debug = false;

			if ($this->AdminSecurityCheck()) {
				$titulo = "Ejercicios";

	            $crud = new grocery_CRUD();
				$crud->set_table("game_exercise");
				$crud->set_subject( $titulo );

				$crud->display_as( 'name' , 'Nombre' );
				$crud->display_as( 'detail' , 'Descripción' );

	            $crud->columns( 'name', 'description' );
				$crud->fields('name', 'description');
				$crud->required_fields( 'name', 'description' );


				$crud->unset_export();
				$crud->unset_print();
				$crud->unset_read();

				$output = $crud->render();
				$dataHeader['PageTitle'] = $titulo;
				$dataHeader['css_files'] = $output->css_files;
				$dataFooter['js_files'] = $output->js_files;
				$dataContent['debug'] = $debug;

				$data['header'] = $this->load->view('admin/header', $dataHeader);
				$data['menu'] = $this->load->view('admin/menu', $dataHeader );

				$data['content'] = $this->load->view('admin/blank', $output);
				$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);


			}else{
				redirect("admin/login");
			}
		 	
	}


	

	public function pacientes(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Pacientes";

            $crud = new grocery_CRUD();
			$crud->set_table("patient");
			$crud->set_subject( $titulo );

			$crud->display_as( 'ci' , 'Cedula' );
			$crud->display_as( 'name' , 'Nombres' );
			$crud->display_as( 'lastname' , 'Apellidos' );
			$crud->display_as( 'born' , 'Fecha de Nacimiento' );
			$crud->display_as( 'gender' , 'Genero' );
			$crud->display_as( 'phone' , 'Telefono' );
			$crud->display_as( 'cellphone' , 'Celular' );
			$crud->display_as( 'email' , 'Correo' );
			$crud->display_as( 'adress' , 'Direccion' );

			$crud->field_type('born', 'date');
			$crud->field_type('adress', 'string');
			$crud->field_type('gender', 'dropdown', array(
                '0' => 'Femenino',
                '1' => 'Masculino'
            ));

			$crud->set_rules('ci', 'Cedula', 'required|min_length[10]|max_length[10]|is_unique[patient.ci]',
        array(
                'required'      => 'The %s field is required.',
                'is_unique'     => 'This %s already exists.'
        ));

			$crud->set_rules('name', 'Nombres', 'required|alpha');
			$crud->set_rules('lastname', 'Apellidos', 'required|alpha');
			$crud->set_rules('phone', 'Telefono', 'required|min_length[9]|numeric|max_length[9]');
			$crud->set_rules('cellphone', 'Celular', 'required|min_length[10]|numeric|max_length[10]');
			$crud->set_rules('email', 'Correo', 'required|valid_email');
			$crud->set_rules('born', 'Fecha de Nacimiento', 'required|callback_date_valid',
				array(
								'date_valid'		=> 'The Fecha de Nacimiento field is invalid.'
				));

			$crud->columns( 'ci', 'name', 'lastname', 'born', 'gender', 'phone', 'cellphone', 'email', 'adress' );
			$crud->fields( 'ci', 'name', 'lastname', 'born', 'gender', 'phone', 'cellphone', 'email', 'adress');
			$crud->required_fields( 'ci', 'name', 'lastname', 'born', 'gender', 'phone', 'cellphone', 'email', 'adress' );

            $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			$output = $crud->render();

			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

            $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );

			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		}else{
			redirect("admin/login");
		}
	}

	

	public function consultas(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Consultas";

            $crud = new grocery_CRUD();
			$crud->set_table("patient_consult");
			$crud->set_subject( $titulo );  

			$crud->display_as( 'id_patient' , 'Paciente' );
			$crud->display_as( 'id_doctor_created' , 'Médico' );
			$crud->display_as( 'id_doctor_attended' , 'Atendido por' );
			$crud->display_as( 'date_created' , 'Fecha de creación' );
			$crud->display_as( 'date_attended' , 'Fecha de atención' );
			$crud->display_as( 'status' , 'Estado' );
			$crud->display_as( 'diagnosis' , 'Diágnostico' );

			$crud->set_primary_key('id_account','account_med');
			$crud->set_relation('id_patient','patient','{name} {lastname}');
			$crud->set_relation('id_doctor_created','account_med','{full_name}');
			$crud->set_relation('id_doctor_attended','account_med','{full_name}');
			

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Pendiente',
                '1' => 'Cancelado',
                '2' => 'Atendido'
            ));

			$crud->field_type('date_created', 'datetime');

			$crud->columns( 'id_doctor_created', 'id_doctor_attended', 'id_patient', 'date_created', 'date_attended', 'status', 'diagnosis' );
			$crud->fields( 'id_doctor_created', 'id_doctor_attended', 'id_patient', 'date_attended', 'status', 'diagnosis' );
			$crud->required_fields( 'id_doctor_created', 'id_patient', 'date_attended', 'status');

            $crud->unset_export();
			$crud->unset_print();
			$crud->unset_read();

			$output = $crud->render();

			$dataHeader['PageTitle'] = $titulo;
			$dataHeader['css_files'] = $output->css_files;
			$dataFooter['js_files'] = $output->js_files;
			$dataContent['debug'] = $debug;

            $data['header'] = $this->load->view('admin/header', $dataHeader);
			$data['menu'] = $this->load->view('admin/menu', $dataHeader );

			$data['content'] = $this->load->view('admin/blank', $output);
			$data['footer'] = $this->load->view('admin/footer-gc', $dataFooter);
		}else{
			redirect("admin/login");
		}
	}

	public function _add_default_date_value(){
		$timezone = date_default_timezone_get();
		date_default_timezone_set($timezone);
		$value = date('m/d/Y h:i:s', time());
		$return = '<input id="field-date_created" name="date_created" type="text" value="'.$value.'" maxlength="19" class="datetime-input form-control hasDatepicker" >';
		return $return;
	}

	


	/* CRUD ends*/

	/* Helpers starts*/
	function AdminSecurityCheck(){
		$UserAdmin = new User();
		$user = $this->session->userdata('Group');
		//Only gets admin and superadmin
		if ($user == 1 or $user ==2){
			return true;
		}else{
			return false;
		}
	}	

	public function authenticate(){
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

	function encrypt_pw($post_array, $pk) {
		if(!empty($post_array['password'])) {
            $post_array['password'] = md5($post_array['password']);
        }else{
        	unset($post_array['password']);
        }
        return $post_array;
	}

	function set_password_input_to_empty() {
		return "<input type='password' name='password' value='' />";
	}

	public function check_dates($fecha2, $fecha1){
		if ($fecha2 > $fecha1){
			return TRUE;
		}else{
			$this->form_validation->set_message('check_dates', "La fecha de inicio no puede ser posterior a la fecha de finalización.");
			return FALSE;
		}
	}

	//Realizar corrección
	public function date_valid ($born) {
		$partes = explode('/', $this->input->post('born'));
		$born = join('-', $partes);
		if ($born < date("Y-m-d")) {
			return true;
		} else {
			return false;
		}
	}

	/* Helpers ends*/
}

?>