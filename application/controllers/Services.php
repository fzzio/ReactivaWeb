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
    	$query = $this->input->post();   	

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

    public function citaGet(){
    	$query = $this->input->post();

    	$this->db->select('patient_consult.id_consult, patient_consult.id_patient, TIME(patient_consult.`date_planned`) AS `hour`, patient_consult.observations, patient_consult.status');
    	$this->db->from('patient_consult');
    	$this->db->where('patient_consult.id_consult', $query['id']);
    	$consulta = $this->db->get()->row_array();

    	$id_patient = $consulta['id_patient'];

    	$this->db->select("CONCAT(patient.name, ' ', patient.lastname) as `fullname`, patient.born, patient.ci, patient.email, CASE WHEN patient.gender = 0 THEN 'Femenino' ELSE 'Masculino' END as `gender`, patient.cellphone");
    	$this->db->from('patient');
    	$this->db->where('patient.id_patient', $id_patient);
    	$paciente = $this->db->get()->row_array();

    	$resultado = array();

    	$resultado['patient'] = $paciente;
    	$resultado['consult'] = $consulta;

    	header('Content-type: application/json');
        echo json_encode($resultado);

    }
}
    
?>