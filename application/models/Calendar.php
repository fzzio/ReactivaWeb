<?php

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Calendar extends CI_Model{

	function __construct() {
		parent::__construct();
        $this->load->database();
	}
	
	public static function getAllMonths($selected = ''){
		$options = '';
		for($i=1;$i<=12;$i++)
		{
			$value = ($i < 10)?'0'.$i:$i;
			$selectedOpt = ($value == $selected)?'selected':'';
			$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
		}
		return $options;
	}


	public static function getYearList($selected = ''){
		$options = '';
		for($i=2015;$i<=2025;$i++)
		{
			$selectedOpt = ($i == $selected)?'selected':'';
			$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
		}
		return $options;
	}

	public static function getCountDay($currentDate){
		$instance_CI =& get_instance();
		$instance_CI->db->select("COUNT(id_doctor_created) AS 'res'");
		$instance_CI->db->from('patient_consult');
		$instance_CI->db->where('DATE(date_planned)', $currentDate);

		$result =  $instance_CI->db->get()->row();
		return $result->res;
	}

	public static function getTherapyCountDay($currentDate){
		$instance_CI =& get_instance();
		$instance_CI->db->select("COUNT(id_doctor_created) AS 'res'");
		$instance_CI->db->from('patient_therapy');
		$instance_CI->db->where('DATE(eta)', $currentDate);

		$result =  $instance_CI->db->get()->row();
		return $result->res;
	}

	
	public static function getDayEvents($date){
		$instance_CI =& get_instance();
		$instance_CI->db->select("patient_consult.`id_consult`, CONCAT(patient.`name`, ' ', patient.`lastname`) AS `fullname`, TIME(patient_consult.`date_planned`) AS `hour`");
		$instance_CI->db->from('patient_consult');
		$instance_CI->db->join('patient', "patient_consult.`id_patient` = patient.`id_patient`");
		$instance_CI->db->where('DATE(date_planned)', $date);
		$instance_CI->db->order_by('hour', 'DESC');

		$result =  $instance_CI->db->get()->result_array();

		if(!is_null($result)){
			$patients_obj_array = array();
			foreach ($result as $pax) {
                $patients_obj_array[] = array(
					'id_consult'=>$pax['id_consult'],
					'fullname'=>$pax['fullname'],
					'hour'=>$pax['hour']);
            }
            return $patients_obj_array;
		}else{
			return null;
		}
	}


	public static function getTherapyDayEvents($date){
		$instance_CI =& get_instance();
		$instance_CI->db->select("patient_therapy.`id_therapy`, CONCAT(patient.`name`, ' ', patient.`lastname`) AS `fullname`, TIME(patient_therapy.`eta`) AS `hour`");
		$instance_CI->db->from('patient_therapy');
		$instance_CI->db->join('patient', "patient_therapy.`id_patient` = patient.`id_patient`");
		$instance_CI->db->where('DATE(eta)', $date);
		$instance_CI->db->order_by('hour', 'DESC');

		$result =  $instance_CI->db->get()->result_array();

		if(!is_null($result)){
			$patients_obj_array = array();
			foreach ($result as $pax) {
                $patients_obj_array[] = array(
					'id_therapy'=>$pax['id_therapy'],
					'fullname'=>$pax['fullname'],
					'hour'=>$pax['hour']);
            }
            return $patients_obj_array;
		}else{
			return null;
		}
	}

	public static function getConsultById($id_consult){
		$instance_CI =& get_instance();
		$instance_CI->db->select("patient_consult.`id_consult`, CONCAT(patient.`name`, ' ', patient.`lastname`) AS `fullname`, TIME(patient_consult.`date_planned`) AS `hour`");
		$instance_CI->db->from('patient_consult');
		$instance_CI->db->join('patient', "patient_consult.`id_patient` = patient.`id_patient`");
		$instance_CI->db->where('DATE(date_planned)', $date);
		$instance_CI->db->order_by('hour', 'DESC');

		$result =  $instance_CI->db->get()->result_array();
		
	}
	
}
?>