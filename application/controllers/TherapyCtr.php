<?php 

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class TherapyCtr extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->model('Therapy');
		$this->load->library('form_validation');
		$this->load->library('grocery_CRUD');
		
		
		date_default_timezone_set("America/Guayaquil");
	}


	function therapys() {
			$debug = false;

		 	$titulo = "Therapias";

            $crud = new grocery_CRUD();
			$crud->set_table("patient_therapy");
			$crud->set_subject( $titulo );

			$crud->display_as( 'date_create' , 'Nombres' );
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


	}

}	

?>