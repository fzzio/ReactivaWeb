<?php 

if (!defined('BASEPATH')) exit ("No direct script access allowed");

class Testing extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('unit_test');
		$this->load->model('User');
		date_default_timezone_set("America/Guayaquil");
	}

	public function index() {
		$user = new User();
	
		$this->unit->run($user->login('mvelasco', 'admin'), true, 'Testing login function');
		$this->unit->run($user->getID('mvelasco'), 1, 'Testing getID function');
		$this->unit->run($user->getGroup('mvelasco'), 1, 'Testing getGroup function');
		$this->unit->run($user->getMail('mvelasco'), 'madelyne@cajanegra.com.ec', 'Testing getMail function');
		$this->unit->run($user->getName('mvelasco'), 'Madelyne Velasco', 'Testing getName function');
		$this->unit->run($user->getPermission(1, 1), true, 'Testing getPermission function');

		echo $this->unit->report();



	}
}