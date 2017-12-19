<?php 
	class MailingChimp_Library
	{
		public function __construct()
		{
			log_message('Debug', 'MailingChimp class is loaded.');
		}

		public function load($api_key = NULL)
		{
			require_once(APPPATH."third_party/mailingchimp/class.mailchimp-api.php");
			$objMailChimp = new MailChimp($api_key);
			return $objMailChimp;
		}
	}
?>