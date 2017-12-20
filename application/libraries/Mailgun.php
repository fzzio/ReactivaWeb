<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailgun {

  var $_to = "";
  var $_cc = "";
  var $_bcc = "";
  var $_from = "";
  var $_subject = "";
  var $_message = "";
  var $_attachments = array();

  public function to($to){
    $this->_to = $to;
    return $this;
  }

  public function cc($cc){
    $this->_cc = $cc;
    return $this;
  }

  public function bcc($bcc){
    $this->_bcc = $bcc;
    return $this;
  }

  public function from($from){
    $this->_from = $from;
    return $this;
  }

  public function subject($subject){
    $this->_subject = $subject;
    return $this;
  }

  public function message($message){
    $this->_message = $message;
    return $this;
  }

  public function attachments($attachments){
    $this->_attachments[] = $attachments;
    return $this;
  }

  public function attach($attachment){
    return $this->attachments($attachment);
  }

  public function send($dominio = "cajanegra.com.ec", $api_key = "key-7875a992392bc13a2e9121186c329a53"){
    date_default_timezone_set('America/Guayaquil');
    $url = "https://api.mailgun.net/v3/" . $dominio .  "/messages";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: multipart/form-data',
    ));  
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, "api:" . $api_key);  
    curl_setopt($ch, CURLOPT_POST, 1);
    $data = array(
      'to' => $this->_to,
      'from' => $this->_from,
      'subject' => $this->_subject,
      'html' => $this->_message,
    );
    if($this->_cc){
      $data["cc"] = $this->_cc;
    }
    if($this->_bcc){
      $data["bcc"] = $this->_bcc;
    }
    for($i = 0; $i < count($this->_attachments); $i++){
      $data["attachment[" . ($i+1) . "]"] = "@" . $this->_attachments[$i];
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    return TRUE;
  }
}
?>