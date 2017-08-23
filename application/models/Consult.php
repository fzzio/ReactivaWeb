<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Consult extends CI_Model{
	private $id;
	private $patient;
	private $doctor_created;
	private $doctor_attended;
	private $date_created;
	private $date_planned;
	private $date_attended;
	private $status;
	private $diagnosis;
	private $observations;

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/* ATTRIBUTES'S SETTERS AND GETTERS */

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getPatient(){
		return $this->patient;
	}

	public function setPatient($patient){
		$this->patient = $patient;
	}

	public function getDoctor_created(){
		return $this->doctor_created;
	}

	public function setDoctor_created($doctor_created){
		$this->doctor_created = $doctor_created;
	}

	public function getDoctor_attended(){
		return $this->doctor_attended;
	}

	public function setDoctor_attended($doctor_attended){
		$this->doctor_attended = $doctor_attended;
	}

	public function getDate_created(){
		return $this->date_created;
	}

	public function setDate_created($date_created){
		$this->date_created = $date_created;
	}

	public function getDate_planned(){
		return $this->date_planned;
	}

	public function setDate_planned($date_planned){
		$this->date_planned = $date_planned;
	}

	public function getDate_attended(){
		return $this->date_attended;
	}

	public function setDate_attended($date_attended){
		$this->date_attended = $date_attended;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getDiagnosis(){
		return $this->diagnosis;
	}

	public function setDiagnosis($diagnosis){
		$this->diagnosis = $diagnosis;
	}

	public function getObservations(){
		return $this->observations;
	}

	public function setObservations($observations){
		$this->observations = $observations;
	}

	/*ATTRIBUTE'S GETTERS AND SETTERS ENDS */

	/*DATABASE GETTING FUNCTIONS STARTS*/

	public static function getConsultInfo($id){
		$instance_CI =& get_instance();
		
		$instance_CI->db->select("patient_consult.id_consult, patient_consult.id_patient, TIME(patient_consult.`date_planned`) AS `hour`, patient_consult.observations, patient_consult.`date_planned`, CASE WHEN patient_consult.status = 0 THEN 'Pendiente' WHEN patient_consult.status = 1 THEN 'Cancelada' WHEN patient_consult.status = 2 THEN 'Asistió' END as `status` ");
    	$instance_CI->db->from('patient_consult');
    	$instance_CI->db->where('patient_consult.id_consult', $id);
    	$consulta = $instance_CI->db->get()->row_array();

    	$id_patient = $consulta['id_patient'];

    	$instance_CI->db->select("CONCAT(patient.name, ' ', patient.lastname) as `fullname`, patient.born, patient.ci, patient.email, CASE WHEN patient.gender = 0 THEN 'Femenino' ELSE 'Masculino' END as `gender`, patient.cellphone");
    	$instance_CI->db->from('patient');
    	$instance_CI->db->where('patient.id_patient', $id_patient);
    	$paciente = $instance_CI->db->get()->row_array();

    	$resultado = array();

    	$resultado['patient'] = $paciente;
    	$resultado['consult'] = $consulta;

    	return $resultado;
	}

	public static function getConsultsByPatient($id){
		$instance_CI =& get_instance();

		$instance_CI->db->select("patient_consult.id_consult, DATE(patient_consult.`date_planned`) AS `date`, CONCAT(account.name, ' ', account.lastname) as `doctor`");
		$instance_CI->db->from('patient_consult');
		$instance_CI->db->join('account', 'account.id_account = patient_consult.id_doctor_attended');
    	$instance_CI->db->where('patient_consult.id_patient', $id);
    	$instance_CI->db->order_by('DATE(patient_consult.`date_planned`)', 'desc');

    	$consults = $instance_CI->db->get()->result_array();

    	if(!is_null($consults)){
			$consults_obj_array = array();
			foreach ($consults as $con) {
				$consults_obj_array[] = array(
					'type'=> "Consulta",
					'id'=>$con['id_consult'],
					'date'=>$con['date'],
					'doctor'=>$con['doctor']);
			}
			return $consults_obj_array;
		}else{
			return null;
		}
	}

	/*DATABASE GETTING FUNCTIONS ENDS*/

}
?>