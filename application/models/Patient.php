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
	private $blood;
	private $allergies;
	private $imagen;
	private $rh;
	private $observations;
	private $illness;
	private $allergies_med;
	private $emergency_contact;
	private $emergency_phone;

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

	public function getBlood(){
		return $this->blood;
	}

	public function setBlood($blood){
		$this->blood = $blood;
	}

	public function getAllergies(){
		return $this->allergies;
	}

	public function setAllergies($allergies){
		$this->allergies = $allergies;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getRh(){
		return $this->rh;
	}

	public function setRh($rh){
		$this->rh = $rh;
	}

	public function getObservations(){
		return $this->observations;
	}

	public function setObservations($observations){
		$this->observations = $observations;
	}

	public function getIllness(){
		return $this->illness;
	}

	public function setIllness($illness){
		$this->illness = $illness;
	}

	public function getAllergies_med(){
		return $this->allergies_med;
	}

	public function setAllergies_med($allergies_med){
		$this->allergies_med = $allergies_med;
	}

	public function getEmergency_contact(){
		return $this->emergency_contact;
	}

	public function setEmergency_contact($emergency_contact){
		$this->emergency_contact = $emergency_contact;
	}

	public function getEmergency_phone(){
		return $this->emergency_phone;
	}

	public function setEmergency_phone($emergency_phone){
		$this->emergency_phone = $emergency_phone;
	}

	/*ATTRIBUTE'S GETTERS AND SETTERS ENDS */

	/* MODEL'S SETTERS AND GETTERS STARTS*/

	public function getPatient(){
		return $this;
	}

	public function setPatient($ID, $CI, $name, $lastname, $born, $gender, $phone, $cellphone, $address, $deleteInfo_ci, $email, $blood, $allergies, $imagen, $rh, $observations, $illness, $allergies_med, $emergency_contact, $emergency_phone){
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
		$this->setBlood($blood);
		$this->setAllergies($allergies);
		$this->setImagen($imagen);
		$this->setRh($rh);
		$this->setObservations($observations);
		$this->setIllness($illness);
		$this->setAllergies_med($allergies_med);
		$this->setEmergency_contact($emergency_contact);
		$this->setEmergency_phone($emergency_phone);
	}

	/*MODEL'S SETTERS AND GETTERS ENDS*/

	/*DATABASE GETTING FUNCTIONS STARTS*/

	public static function getPatientById($id_patient){
		if (!is_null($id_patient)){
			$instance_CI =& get_instance();

			$patient = null;

			$instance_CI->db->select('patient.id_patient, patient.ci, patient.name, patient.lastname, patient.born, patient.gender, patient.phone, patient.cellphone, patient.address, patient.deleteInfo_ci, patient.email, patient.blood, patient.allergies, patient.img, patient.rh, patient.observations, patient.illness, patient.allergies_med, patient.emergency_contact, patient.emergency_phone');
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
					$patient->email,
					$patient->blood,
					$patient->allergies,
					($patient->img != "") ? base_url('assets/img/patient-profile/').$patient->img : base_url('assets/img/web/rea-profile.png'),
					$patient->rh,
					$patient->observations,
					$patient->illness,
					$patient->allergies_med,
					$patient->emergency_contact,
					$patient->emergency_phone);
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

	public function record_count() {
        return $this->db->count_all("patient");
    }

    public function fetch_patients($limit, $start) {
    	$instance_CI =& get_instance();

		$patients = null;

		$instance_CI->db->select("patient.id_patient, patient.name, patient.lastname, DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(patient.born, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(patient.born, '00-%m-%d')) as `age`, patient.ci, patient.email");
		$instance_CI->db->from('patient');
		$instance_CI->db->limit($limit, $start);
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
        }
        return null;
   }


	/*DATABASE GETTING FUNCTIONS ENDS*/
}

?>