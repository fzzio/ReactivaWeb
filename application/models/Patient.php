<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Patient extends CI_Model{
	private $ID;
	private $CI;
	private $name;
	private $lastname;
	private $born;
	private $gender;
	private $phone;
	private $cellphone;
	private $address;
	private $deleteInfo_ci;
	private $email;

	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	/* ATTRIBUTES'S SETTERS AND GETTERS */
	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getCI(){
		return $this->CI;
	}

	public function setCI($CI){
		$this->CI = $CI;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getLastname(){
		return $this->lastname;
	}

	public function setLastname($lastname){
		$this->lastname = $lastname;
	}

	public function getBorn(){
		return $this->born;
	}

	public function setBorn($born){
		$this->born = $born;
	}

	public function getGender(){
		return $this->gender;
	}

	public function setGender($gender){
		$this->gender = $gender;
	}

	public function getPhone(){
		return $this->phone;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getCellphone(){
		return $this->cellphone;
	}

	public function setCellphone($cellphone){
		$this->cellphone = $cellphone;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function getDeleteInfo_ci(){
		return $this->deleteInfo_ci;
	}

	public function setDeleteInfo_ci($deleteInfo_ci){
		$this->deleteInfo_ci = $deleteInfo_ci;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	/* MODEL'S SETTERS AND GETTERS */

	public function getPatient(){
		return $this;
	}

	public function setPatient($ID, $CI, $name, $lastname, $born, $gender, $phone, $cellphone, $address, $deleteInfo_ci, $email){
		$this->setID($ID);
		$this->setCI($CI);
		$this->setName($name);
		$this->setLastname($lastname);
		$this->setBorn($born);
		$this->setGender($gender);
		$this->setPhone($phone);
		$this->setCellphone($cellphone);
		$this->setAddress($address);
		$this->setDeleteInfo_ci($deleteInfo_ci);
		$this->setEmail($email);
	}

	/*DATABASE GETTING FUNCTIONS*/

	public static function getPatientById($id_patient){
		if (!is_null($id_patient)){
			$instance_CI =& get_instance();

			$patient = null;

			$instance_CI->db->select('patient.id_patient, patient.ci, patient.name, patient.lastname, patient.born, patient.gender, patient.phone, patient.cellphone, patient.address, patient.deleteInfo_ci, patient.email');
			$instance_CI->db->from('patient');
			$instance_CI->db->where('patient.id_patient', $id_patient);
			$patient = $instance_CI->db->get()->row();

			if(!is_null($patient)){
				$patient_obj = new Patient();

				$patient_obj->setPatient(
					$patient->id_patient,
					$patient->ci,
					$patient->name,
					$patient->lastname,
					$patient->born,
					$patient->gender,
					$patient->phone,
					$patient->cellphone,
					$patient->address,
					$patient->deleteInfo_ci,
					$patient->email);
				return $patient_obj;
			}else{
				return null;
			}
		}else{
			return null;
		}
	}

	public static function getPatients(){
		$instance_CI =& get_instance();

		$patients = null;

		$instance_CI->db->select("patient.id_patient, patient.name, patient.lastname, DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(patient.born, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(patient.born, '00-%m-%d')) as `age`, patient.ci, patient.email");
		$instance_CI->db->from('patient');
		$patients = $instance_CI->db->get()->result_array();

		if(!is_null($patients)){
			$patients_obj_array = array();
			foreach ($patients as $pax) {
				$patients_obj_array[] = array(
					'id_patient'=>$pax['id_patient'],
					'name'=>$pax['name'],
					'lastname'=>$pax['lastname'],
					'born'=>$pax['age'],
					'ci'=>$pax['ci'],
					'email'=>$pax['email']);
			}
			return $patients_obj_array;
		}else{
			return null;
		}
	}
}

?>