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
            $dataHeader['PageTitle'] = "Reactiva";

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
			$userAdmin = new User();
			$userAdmin->logout();
			redirect("admin/login");
		}else{
			redirect("admin/login");
		}
	}


	/* CRUD Starts*/
	public function admins(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Administradores";

            $crud = new grocery_CRUD();
			$crud->set_table("account");
			$crud->set_subject( $titulo );

			$crud->display_as( 'name' , 'Nombres' );
			$crud->display_as( 'lastname' , 'Apellidos' );
			$crud->display_as( 'username' , 'Usuario' );
			$crud->display_as( 'email' , 'Correo' );
			$crud->display_as( 'password' , 'Contraseña' );
			$crud->display_as( 'last_ip' , 'Última IP' );
			$crud->display_as( 'last_login' , 'Última Conexión' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

			$crud->field_type('last_login', 'readonly');
			$crud->field_type('last_ip', 'readonly');

			$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
            $crud->callback_add_field('password',array($this,'set_password_input_to_empty'));

            $crud->field_type('password','password');

            $crud->callback_before_update(array($this,'encrypt_pw'));
            $crud->callback_before_insert(array($this,'encrypt_pw'));

			$crud->columns( 'name', 'lastname', 'username', 'email', 'last_ip', 'last_login', 'status' );
			$crud->fields( 'name', 'lastname', 'username', 'email', 'password', 'status');
			$crud->required_fields( 'name', 'lastname', 'username', 'email', 'status'  );

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

	public function users(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Staff médico";

            $crud = new grocery_CRUD();
			$crud->set_table("account");
			$crud->set_subject( $titulo );

			$crud->display_as( 'name' , 'Nombres' );
			$crud->display_as( 'lastname' , 'Apellidos' );
			$crud->display_as( 'username' , 'Usuario' );
			$crud->display_as( 'email' , 'Correo' );
			$crud->display_as( 'password' , 'Contraseña' );
			$crud->display_as( 'last_ip' , 'Última IP' );
			$crud->display_as( 'last_login' , 'Última Conexión' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

			$crud->field_type('last_login', 'readonly');
			$crud->field_type('last_ip', 'readonly');

			$crud->callback_edit_field('password',array($this,'set_password_input_to_empty'));
            $crud->callback_add_field('password',array($this,'set_password_input_to_empty'));

            $crud->field_type('password','password');

            $crud->callback_before_update(array($this,'encrypt_pw'));
            $crud->callback_before_insert(array($this,'encrypt_pw'));

			$crud->columns( 'name', 'lastname', 'username', 'email', 'last_ip', 'last_login', 'status' );
			$crud->fields( 'name', 'lastname', 'username', 'email', 'password', 'status');
			$crud->required_fields( 'name', 'lastname', 'username', 'email', 'status'  );

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
			$titulo = 'Contactos';
			$crud = new grocery_CRUD();
			$crud ->set_table('web_contact');
			$crud -> set_subject($titulo);

			$crud->unset_add();
			$crud->unset_edit();

			$crud -> field_type('date','date');
			$crud -> field_type('name','string');
			$crud -> field_type('email','string');
			$crud -> field_type('message','text');

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
			redirect("admin/login");
		}
	}


	/**
	 * CRUD de todas las terapias
	 * @return una lista con todas las terapias disponibles
	 *
	 * datos usados
	 * INSERT INTO `patient` (`ci`, `name`, `lastname`, `born`, `gender`, `phone`, `cellphone`,`adress`,`email`) VALUES
	( '0924262397', 'Israel', 'Zurita', '2016-09-23','1','072421191','0988829914','La Troncal', 'izurita@espol.edu.ec');
	 */
	public function terapias() {
		$debug = false;

		if ($this->AdminSecurityCheck()) {
			$titulo = "Terapias";

            $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy");
			$crud->set_subject( $titulo );

			$crud->display_as( 'date_create' , 'Fecha de Creación' );
			$crud->display_as( 'eta' , 'Inicio Estimado' );
			$crud->display_as( 'etf' , 'Fin Estimado' );
			$crud->display_as( 'starttime' , 'Hora Inicio' );
			$crud->display_as( 'finishtime' , 'Hora Fin' );
			$crud->display_as( 'comment' , 'Comentarios' );
			$crud->display_as( 'sendmail' , 'Envío de Correo' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

            $crud->field_type('sendmail', 'dropdown', array(
                '0' => 'No',
                '1' => 'Si'
            ));

            $crud->columns( 'eta', 'etf', 'starttime', 'finishtime', 'comment', 'sendmail','status' );
			$crud->fields('etf', 'starttime', 'finishtime', 'comment', 'sendmail','status');
			$crud->required_fields('etf', 'starttime', 'finishtime','status' );


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

			//$crud->set_relation_n_n('Paciente','patient_therapy','patient','id_patient','id_patient','name');
			$crud->set_relation('id_therapy','patient_therapy','id_therapy');
			$crud->set_subject( $titulo );

			$crud->display_as( 'id_therapy' , 'Numero de Terapia' );
			$crud->display_as( 'img' , 'Imagen' );
			$crud->set_field_upload('img','assets/uploads',"jpg|png");
			
			$crud->display_as( 'comment' , 'Comentario' );

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
	 * DATOS USADOS
	 * 
	 * INSERT INTO `game_limb` (`id_limb`, `name`) VALUES (1, 'Juego De la Tortuga');
       INSERT INTO `game_exercise` (`id_exercise`, `name`, `description`, `id_limb`) VALUES (1, 'Movimientos de Pierna','Mover las piernas en distintos angulos', '1');
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


	public function admin_nivel(){
		$debug = false;
		if ($this->AdminSecurityCheck()) {
			$titulo = 'Nivel de administrador';
			$crud = new grocery_CRUD();
			$crud ->set_table('rbac_admin_group');
			$crud -> set_subject($titulo);

			$crud -> display_as('id_admin','Administrador');
			$crud -> display_as('id_group','Grupo');

			$crud->set_primary_key('id_admin','admin_name');
			$crud->set_relation('id_admin', 'admin_name', 'name');
			$crud->set_relation('id_group', 'rbac_group', 'name');

			$crud -> columns('id_admin','id_group');
			$crud -> fields('id_admin','id_group');
			$crud -> required_fields('id_admin','id_group');

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

	public function consultas(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Consultas";

            $crud = new grocery_CRUD();
			$crud->set_table("patient_consult");
			$crud->set_subject( $titulo );  

			$crud->set_relation('id_patient','patient','{name} {lastname}');
			$crud->set_relation('id_doctor_created','account','{name} {lastname}');
			$crud->set_relation('id_doctor_attended','account','{name} {lastname}');

			$crud->display_as( 'id_patient' , 'Paciente' );
			$crud->display_as( 'id_doctor_created' , 'Médico' );
			$crud->display_as( 'id_doctor_attended' , 'Atendido por' );
			$crud->display_as( 'date_created' , 'Fecha de creación' );
			$crud->display_as( 'date_attended' , 'Fecha de atención' );
			$crud->display_as( 'status' , 'Estado' );
			$crud->display_as( 'diagnosis' , 'Diágnostico' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Atendido',
                '1' => 'No fue atendido',
                '2' => 'Atrasado',
                '3' => 'Cancelado' 
            ));
			$crud->field_type('diagnosis', 'textarea');
			$crud->field_type('date_created', 'datetime');

			$crud->callback_add_field('date_created', array($this,'_add_default_date_value'));	

			$crud->columns( 'id_doctor_created', 'id_doctor_attended', 'id_patient', 'date_created', 'date_attended', 'status', 'diagnosis' );
			$crud->fields( 'id_doctor_created', 'id_doctor_attended', 'id_patient', 'date_created', 'date_attended', 'status', 'diagnosis' );
			$crud->required_fields( 'id_doctor_created', 'id_doctor_attended', 'id_patient', 'date_attended', 'status');

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

	public function provincias(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Provincias";

            $crud = new grocery_CRUD();
			$crud->set_table("geo_province");
			$crud->set_subject( $titulo );  

			$crud->display_as( 'name' , 'Provincia' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

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

	public function ciudad(){
		$debug = false;

		if ($this->AdminSecurityCheck()){
            $titulo = "Ciudades";

            $crud = new grocery_CRUD();
			$crud->set_table("geo_city");
			$crud->set_subject( $titulo );  

			$crud->display_as( 'name' , 'Ciudad' );
			$crud->display_as( 'status' , 'Estado' );

			$crud->set_relation('id_province', 'geo_province', 'name');

			$crud->field_type('status', 'dropdown', array(
                '0' => 'Inactivo',
                '1' => 'Activo'
            ));

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


	/* CRUD ends*/
	/* Helpers starts*/
	function AdminSecurityCheck(){
		$UserAdmin = new User();
		$user = $this->session->userdata('Mail');
		if ($user){
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

		print_r($this->session->userdata);

		if ($this->session->userdata) {
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
		return "<input type='text' name='password' value='' />";
	}
}

?>