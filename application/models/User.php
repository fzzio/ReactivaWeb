<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class User extends CI_Model{
	private $username;
	private $email;
	private $name;
	private $lastname;
	private $status;

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	//Verify if user password combination exists
	function verifyUser($username, $password){
		$res = $this->db->get_where("account", array('username' => $username, 'password' => md5($password)))->row();

		if($res){
			return true;
		}else{
			return false;
		}
	}

	//Get rbac group for admin user
	function getGroup($username){
		$this->db->select('rbac_group.id_group');
		$this->db->from('rbac_group');
		$this->db->join('account', 'account.id_group = rbac_group.id_group');
		$this->db->where('account.username', $username);

		$query = $this->db->get()->result_array();
		$res = $query[0]['id_group'];

		return $res;
	}

	//Returns email for admin user
	function getMail($username){
		$this->db->select('email');
		$this->db->from('account');
		$this->db->where('username', $username);

		$query = $this->db->get()->result_array();
		$res = $query[0]['email'];

		return $res;
	}

	// Returns full name of admin user
	function getName($username){
		$this->db->select('name, lastname');
		$this->db->from('account');
		$this->db->where('username', $username);

		$query = $this->db->get()->result_array();
		$res = $query[0]['name']. " " . $query[0]['lastname'];

		return $res;
	}

	// Returns ID of user
	function getID($username){
		$this->db->select('id_account');
		$this->db->from('account');
		$this->db->where('username', $username);

		$query = $this->db->get()->result_array();
		$res = $query[0]['id_account'];

		return $res;
	}

	function login($username, $password){
		if ($this->verifyUser($username, $password)){
			$admin_data = array("Group" => $this->getGroup($username), "ID" => $this->getID($username), "Mail" => $this->getMail($username), "Name" => $this->getName($username));
			$this->session->set_userdata($admin_data);
			return true;
		} else {
			return false;
		}
	}

	function logout(){
		$this->session->sess_destroy();
	}

	public static function getPermission($id_user, $id_permission){
		$instance_CI =& get_instance();

		$instance_CI->db->select("rbac_group_permission.id_permission");
		$instance_CI->db->from('rbac_group_permission');
		$instance_CI->db->join('rbac_group', 'rbac_group.id_group = rbac_group_permission.id_group');
		$instance_CI->db->join('account', 'account.id_group = rbac_group.id_group');
		$instance_CI->db->where('account.id_account', $id_user);
		$instance_CI->db->where('rbac_group_permission.id_permission', $id_permission);

		$query = $instance_CI->db->get()->row();

		if($query){
			return true;
		}else{
			return false;
		}

	}

}
?>