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
			$userAdmin = new UserAdmin();
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
			$crud->set_table("acc_admin");
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
			$crud->set_table("acc_med");
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

	/* CRUD ends*/
	/* Helpers starts*/
	function AdminSecurityCheck(){
		$UserAdmin = new UserAdmin();
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

		$userAdmin = new UserAdmin();

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