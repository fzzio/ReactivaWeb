<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Limb extends CI_Model{
	private $id;
	private $name;
	private $icon;

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

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getIcon(){
		return $this->icon;
	}

	public function setIcon($icon){
		$this->icon = $icon;
	}

	/*ATTRIBUTE'S GETTERS AND SETTERS ENDS */

	/* MODEL'S SETTERS AND GETTERS STARTS*/

	public function getLimb(){
		return $this;
	}

	public function setLimb($id, $name, $icon){
		$this->setId($id);
		$this->setName($name);
		$this->setIcon($icon);
	}

	/*MODEL'S SETTERS AND GETTERS ENDS*/

	/*DATABASE GETTING FUNCTIONS STARTS*/

	public static function getLimbs(){
		$instance_CI =& get_instance();

		$limbs = null;

		$instance_CI->db->select("game_limb.id_limb, game_limb.name, game_limb.icon");
		$instance_CI->db->from('game_limb');
		$limbs = $instance_CI->db->get()->result_array();

		if(!is_null($limbs)){
			$limb_obj_array = array();
			foreach ($limbs as $lb) {
				$patients_obj_array[] = array(
					'id_limb'=>$lb['id_limb'],
					'name'=>$lb['name'],
					'icon'=>  base_url('assets/img/icons-exercise/').$lb['icon']);
			}
			return $patients_obj_array;
		}else{
			return null;
		}

	}

	/*DATABASE GETTING FUNCTIONS ENDS*/
}
?>