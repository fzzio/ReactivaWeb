<?php 
if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Geography_model extends CI_Model{
	private $name;
	private $status;


	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	

}
?>