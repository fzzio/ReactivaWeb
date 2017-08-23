<?php 

if (!defined('BASEPATH')) exit ("No direct script access allowed");

class Testing extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('unit_test');
		$this->load->model('User');
		$this->load->model('Patient');
		date_default_timezone_set("America/Guayaquil");
	}

	public function index() {
		
		$this->db->where('account.username', 'mvelasco');
		$this->db->delete('account');

		$userDB = array(
						'id_account' => 1,
            'username' => 'mvelasco',
            'email' => 'madelyne@cajanegra.com.ec',
            'name' => 'Madelyne',
            'lastname' => 'Velasco',
            'password' => md5('admin'),
            'id_group' => 1,
            'status' => 1
        );

    $this->db->insert('account', $userDB);	

    $this->db->where('patient.id_patient', '2');
		$this->db->delete('patient');

    $patientDB = array(
						'id_patient' => 2,
            'ci' => '0926804006',
            'name' => 'Edgar',
            'lastname' => 'Moreira',
            'born' => '2017-01-19',
            'gender' => 1,
            'phone' => '042250902',
            'cellphone' => '7596100742',
            'emergency_contact' => 'Veronica Moreira',
            'emergency_phone' => '0948383221',
            'address' => 'Gladstone Terrace, 4',
            'blood' => 'A',
            'rh' => '+',
            'allergies' => 'Ninguna',
            'allergies_med' => 'Ninguna',
            'observations' => 'Ninguna',
            'illness' => 'Ninguna',
            'email' => 'emoreira@gmail.com'
        );

    $this->db->insert('patient', $patientDB);

    $user = new User();
		$this->unit->run($user->login('mvelasco', 'admin'), true, 'Testing login function');
		$this->unit->run($user->getID('mvelasco'), 1, 'Testing getID function');
		$this->unit->run($user->getGroup('mvelasco'), 1, 'Testing getGroup function');
		$this->unit->run($user->getMail('mvelasco'), 'madelyne@cajanegra.com.ec', 'Testing getMail function');
		$this->unit->run($user->getName('mvelasco'), 'Madelyne Velasco', 'Testing getName function');
		$this->unit->run($user->getPermission(1, 1), true, 'Testing getPermission function');

		$patient = new Patient();
		$patient->setPatient(2, '0926804006', 'Edgar', 'Moreira', '2017-01-19', 1, '042250902', '7596100742', 'Gladstone Terrace, 4', null, 'emoreira@gmail.com', 'A', 'Ninguna', null, '+', 'Ninguna', 'Ninguna', 'Ninguna', 'Veronica Moreira', '0948383221');

		$this->unit->run($patient->getPatientbyId('2'), true, 'Testing getPatientbyId function');
		$this->unit->run($patient->getID(), true, 'Testing getID function');
		$this->unit->run($patient->getCI(), true, 'Testing getCI function');
		$this->unit->run($patient->getName(), true, 'Testing getName function');
		$this->unit->run($patient->getLastname(), true, 'Testing getLastname function');
		$this->unit->run($patient->getBorn(), true, 'Testing getBorn function');
		$this->unit->run($patient->getGender(), true, 'Testing getGender function');
		$this->unit->run($patient->getPhone(), true, 'Testing getPhone function');
		$this->unit->run($patient->getCellphone(), true, 'Testing getCellphone function');
		$this->unit->run($patient->getAddress(), true, 'Testing getAddress function');
		$this->unit->run($patient->getEmail(), true, 'Testing getEmail function');
		$this->unit->run($patient->getBlood(), true, 'Testing getBlood function');
		$this->unit->run($patient->getAllergies(), true, 'Testing getAllergies function');
		$this->unit->run($patient->getRh(), true, 'Testing getRh function');
		$this->unit->run($patient->getObservations(), true, 'Testing getObservations function');
		$this->unit->run($patient->getIllness(), true, 'Testing getIllness function');
		$this->unit->run($patient->getAllergies_med(), true, 'Testing getAllergies_med function');
		$this->unit->run($patient->getEmergency_contact(), true, 'Testing getEmergency_contact function');
		$this->unit->run($patient->getEmergency_phone(), true, 'Testing getEmergency_phone function');
		$this->unit->run($patient->getImagen(), false, 'Testing getImagen function');
		$this->unit->run($patient->getDeleteInfo_ci(), false, 'Testing getDeleteInfo_ci function');
		$this->unit->run($patient->getPatients('2'), true, 'Testing getPatients function');
		$this->unit->run($patient->record_count('2'), true, 'Testing record_count function');

		echo $this->unit->report();

	}
}