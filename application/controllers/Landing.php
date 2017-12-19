<?php

if( !defined('BASEPATH')) exit ("No direct script access allowed");

class Landing extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper(array('url'));
		$this->load->library('form_validation');

		setlocale(LC_ALL,"es_ES");
		date_default_timezone_set("America/Guayaquil");
	}

	public function index(){
		$dataHeader['PageTitle'] = "Bienvenidos";
		$data['landing'] = $this->load->view('landing/index', array());
	}

	public function contacto(){
		// =============================================
		// CONFIGURATIONS
		// =============================================

		// Headers
		// you can add more than one email address
		$to_email_addresses       = array( 'info@cajanegra.com.ec' => 'Información REACTIVA' );
		$cc_email_addresses       = array( 'info@cajanegra.com.ec' => 'Información REACTIVA' );
		$bcc_email_addresses      = array( 'info@cajanegra.com.ec' => 'Información REACTIVA' );
		$reply_to_email_addresses = array( 'info@cajanegra.com.ec' => 'Información REACTIVA' );

		// Body
		$subject_prefix = 'REACTIVA vía Web :: ';

		// SMTP
		// SMTP is not supported. Please contact me to get specific helps.
		// $is_smtp = false;

		// Validation messages
		$error_messages  = array(
			'name'    => 'Por favor ingrese su Nombre.',
			'email'   => 'Por favor ingrese su email correctamente.',
			'subject' => 'Por favor ingrese el Asunto.',
			'message' => 'Por favor escriba su Mensaje.',
			'else'    => 'Un error ha ocurrido.',
		);
		$success_message  = '¡Email enviado correctamente!';

		// =============================================
		// BEGIN SEND EMAIL PROCESS
		// =============================================

		// Form's values
		$name = isset( $_REQUEST['name'] ) ? $_REQUEST['name'] : '';
		$email = isset( $_REQUEST['email'] ) ? $_REQUEST['email'] : '';
		$subject = isset( $_REQUEST['subject'] ) ? $_REQUEST['subject'] : '';
		$message = isset( $_REQUEST['message'] ) ? $_REQUEST['message'] : '';

		// Validation
		$errors = array();
		if ( empty( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) $errors[] = $error_messages['email'];
		if ( empty( $name ) ) $errors[] = $error_messages['name'];
		if ( empty( $subject ) ) $errors[] = $error_messages['subject'];
		if ( empty( $message ) ) $errors[] = $error_messages['message'];

		if ( count( $errors ) ) {
			$result['status'] = 'error';
			$result['message'] = implode( '<br />', $errors );

			// Send output
			if ( ! empty( $_REQUEST[ 'ajax' ] ) ) {
				// called via AJAX
				echo json_encode( $result );
			} else {
				// no AJAX
				echo 'Error: ' . '<br />' . $result['message'];
			}

			return;
		}


		// Initiate PHPMailer
		$this->load->library("PHPMailer_Library");
        $mail = $this->phpmailer_library->load();

		// headers
		$mail->From = $email;
		$mail->FromName = $name;
		foreach ( $to_email_addresses as $e => $n ) $mail->addAddress( $e, $n );
		foreach ( $cc_email_addresses as $e => $n ) $mail->addCC( $e, $n );
		foreach ( $bcc_email_addresses as $e => $n ) $mail->addBCC( $e, $n );
		foreach ( $reply_to_email_addresses as $e => $n ) $mail->addReplyTo( $e, $n );

		// body
		$mail->Subject = $subject_prefix . $subject;
		$mail->Body    = $message;

		// send
		if ( ! $mail->send() ) {
			$result['status'] = 'error';
			$result['message'] = $error_messages['else'];
		} else {
			$result['status'] = 'success';
			$result['message'] = $success_message;
		}

		// Send output
		if ( ! empty( $_REQUEST[ 'ajax' ] ) ) {
			// called via AJAX
			echo json_encode( $result );
		} else {
			// no AJAX
			if ( $result['status'] == 'error' ) {
				echo 'Error: ' . $mail->ErrorInfo;
			} else {
				echo 'Success';
			}
		}
	}

	public function addToNewsletter(){

	}

}

?>