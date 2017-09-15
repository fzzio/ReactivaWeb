<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->helper(array('url'));
        $this->load->database();

        date_default_timezone_set("America/Guayaquil");
        header('Access-Control-Allow-Origin: *'); 
        setlocale(LC_TIME, 'spanish');
    }

    public function index() {
        redirect("web/index");
    }

    public function saveComments(){
        $query = $this->input->post();  

        $id_therapy = $query['id_therapy'];
        $comment = $query['comentario'];
        $stamp = $query['tiempo'];


        $resultado = array();

        if ( !is_null($id_therapy) && !is_null($comment) && !is_null($stamp) ){
            $data = array(
	            'id_therapy'=>$id_therapy,
	            'date'=>$stamp,
	            'msg'=>$comment
	        );

        	$this->db->insert('patient_therapy_comment', $data);

        	$resultado['event'] = 1;
        }else{
            $resultado['event'] = 0;
        }
        header('Content-type: application/json');
        echo json_encode($resultado);     
    }
}

?>