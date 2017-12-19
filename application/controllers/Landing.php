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
		// =============================================
		// CONFIGURATIONS
		// =============================================

		// Authentication
		$api_key         = 'aa8471c997137dab16b5976f41314d70-us14'; // Find on your Account Settings > Extras > API Keys
		$list_id         = '35bc4ce12e'; // Find on your List > Settings

		// Validation messages
		$error_messages   = array(
			'List_AlreadySubscribed' => 'El correo electrónico que ingresaste ya está suscrito.',
			'Email_NotExists'        => 'El correo electrónico que ingresaste no es válido.',
			'else'                   => 'Ocurrió un error.',
		);
		$success_message = 'Te has sucrito con éxito!';

		// =============================================
		// BEGIN SUBSCRIBE PROCESS
		// =============================================

		// Form's values
		$email = isset( $_REQUEST['email'] ) ? $_REQUEST['email'] : '';

		// Initiate API object
		$this->load->library("MailingChimp_Library");
        $mailchimp = $this->mailingchimp_library->load( $api_key);

		// Request parameters
		$config  = array(
			'id'                => $list_id,
			'email'             => array( 'email' => $email ),
			'merge_vars'        => NULL,
			'email_type'        => 'html',
			'double_optin'      => true,
			'update_existing'   => false,
			'replace_interests' => true,
			'send_welcome'      => false,
		);

		// Send request
		// http://apidocs.mailchimp.com/api/2.0/lists/subscribe.php
		$result = $mailchimp->call( 'lists/subscribe', $config );

		if ( array_key_exists( 'status', $result ) && $result['status'] == 'error' ) {
			// If error occurs
			$result['message'] = array_key_exists( $result['name'], $error_messages ) ? $error_messages[ $result['name'] ] : $error_messages['else'];
		} else {
			// If success
			$result['message'] = $success_message;
		}

		// Send output
		if ( ! empty( $_REQUEST[ 'ajax' ] ) ) {
			// called via AJAX
			echo json_encode( $result );
		} else {
			// no AJAX
			if ( array_key_exists( 'status', $result ) && $result['status'] == 'error' ) {
				echo 'Error: ' . $result['error'];
			} else {
				echo '¡Gracias por suscribirte a nuestro boletín!';
			}
		}

	}

}

?>