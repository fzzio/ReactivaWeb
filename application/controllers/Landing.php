<?php

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Landing extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->library('form_validation');

		setlocale(LC_ALL,"es_ES");
		date_default_timezone_set("America/Guayaquil");
	}

	public function index(){
		$dataHeader['PageTitle'] = "Bienvenidos";
		$data['landing'] = $this->load->view('landing/index', array());
	}

}

?>