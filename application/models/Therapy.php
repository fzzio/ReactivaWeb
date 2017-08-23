<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Therapy extends CI_Model{
	private $date_created;
	private $eta;
	private $etf;
	private $starttime;
	private $finishtime;
	private $comment;
	private $sendmail;
	private $status;

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	/* ATTRIBUTES'S SETTERS AND GETTERS */
	public function getDate_created(){
		return $this->date_created;
	}

	public function setDate_created($date_created){
		$this->date_created = $date_created;
	}

	public function getEta(){
		return $this->eta;
	}

	public function setEta($eta){
		$this->eta = $eta;
	}

	public function getEtf(){
		return $this->etf;
	}

	public function setEtf($etf){
		$this->etf = $etf;
	}

	public function getStarttime(){
		return $this->starttime;
	}

	public function setStarttime($starttime){
		$this->starttime = $starttime;
	}

	public function getFinishtime(){
		return $this->finishtime;
	}

	public function setFinishtime($finishtime){
		$this->finishtime = $finishtime;
	}

	public function getComment(){
		return $this->comment;
	}

	public function setComment($comment){
		$this->comment = $comment;
	}

	public function getSendmail(){
		return $this->sendmail;
	}

	public function setSendmail($sendmail){
		$this->sendmail = $sendmail;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}	

	/*ATTRIBUTE'S GETTERS AND SETTERS ENDS */

	/*DATABASE GETTING FUNCTIONS STARTS*/

	public static function getTherapiesByPatient($id){
		$instance_CI =& get_instance();

		$instance_CI->db->select("patient_therapy.id_therapy, DATE(patient_therapy.`eta`) AS `date`, CONCAT(account.name, ' ', account.lastname) as `doctor`");
		$instance_CI->db->from('patient_therapy');
		$instance_CI->db->join('account', 'account.id_account = patient_therapy.id_doctor_attended');
    	$instance_CI->db->where('patient_therapy.id_patient', $id);
    	$instance_CI->db->order_by('DATE(patient_therapy.`eta`)', 'desc');

    	$therapies = $instance_CI->db->get()->result_array();

    	if(!is_null($therapies)){
			$consults_obj_array = array();
			foreach ($therapies as $con) {
				$consults_obj_array[] = array(
					'type'=> "Terapia",
					'id'=>$con['id_therapy'],
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