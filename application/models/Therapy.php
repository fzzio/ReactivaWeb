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
		$this->load->library('session');
	}

	

}
?>