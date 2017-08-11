<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->library('form_validation');
        $this->load->database();

        date_default_timezone_set("America/Guayaquil");
        header('Access-Control-Allow-Origin: *'); 
        setlocale(LC_TIME, 'spanish');
    }

    public function index() {
        redirect("web/index");
    }

    public function checklogin(){
    	$query = $this->input->get();   	

		$this->db->select('id_group');
		$this->db->from('account');
		$this->db->where('username', $query['user']);
		$this->db->where('password', $query['pass']);
		$res = $this->db->get()->row_array();

		$group = $res['id_group'];

		$resultado = array();

		if ($group){
			if ($group == '5') {
            	$resultado['event'] = 1;
	        }else{
	        	$resultado['event'] = 0;
			}
		}else{
			$resultado['event'] = 0;
		}


    	header('Content-type: application/json');
        echo json_encode($resultado);

    }
}
    
?>