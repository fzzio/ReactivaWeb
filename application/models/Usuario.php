<?php
	if (! defined('BASEPATH')) exit('No direct script access allowed');
	class Usuario extends CI_Model{
		private $id;
		private $nombres;
		private $apellidos;
		private $nUsuario;
		private $correo;
		private $estado;

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		/*
		//SETTERS
		*/
		public function setId($id){
			$this->id =$id;
		}
		public function setNombres($nombres){
			$this->nombres =$nombres;
		}
		public function setApellidos($apellidos){
			$this->apellidos =$apellidos;
		}
		public function setNUsuario($nUsuario){
			$this->nUsuario =$nUsuario;
		}
		public function setCorreo($correo){
			$this->correo =$correo;
		}
		public function setEstado($estado){
			$this->estado =$estado;
		}

		/*
		GETTERS
		*/
		public function getId(){
			return $this->id;
		}
		public function getNombres(){
			return $this->nombres;
		}
		public function getApellidos(){
			return $this->apellidos;
		}
		public function getNUsuario(){
			return $this->nUsuario;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function getEstado(){
			return $this->estado;
		}



		public function getUsuario(){
			return $this;
		}

		public function setUsuario( $id, $nombres, $apellidos, $nUsuario, $correo, $estado ){
			$this->setId( $id );
			$this->setNombres( $nombres );
			$this->setApellidos( $apellidos );
			$this->setNUsuario( $nUsuario );
			$this->setCorreo( $correo );
			$this->setEstado( $estado );
		}
		public function setUsuarioObj( Usuario $usuario){
			$this->setId( $usuario->getId() );
			$this->setNombres( $usuario->getNombres() );
			$this->setApellidos( $usuario->getApellidos() );
			$this->setNUsuario( $usuario->getNUsuario() );
			$this->setCorreo( $usuario->getCorreo() );
			$this->setEstado( $usuario->getEstado() );
		}

		public function getUsuarioObj( Usuario $usuario ){
			$this->setId( $usuario->getId() );
			$this->setNombres( $usuario->getNombres() );
			$this->setApellidos( $usuario->getApellidos() );
			$this->setNUsuario( $usuario->getNUsuario() );
			$this->setCorreo( $usuario->getCorreo() );
			$this->setEstado( $usuario->getEstado() );
		}

		public static function getUsuarioID($ID){
			if(!is_null($ID)){
				$instanciaUsuario =& get_instance();
				$usuarioDB = null;
				$instanciaUsuario->db->select("u.*");
				$instanciaUsuario->db->from("Usuario AS u");
				$instanciaUsuario->db->where("u.id",intval($ID));
				$usuarioDB=$instanciaUsuario->db->get()->row();

				if(!is_null($usuarioDB)){
					$usuarioObj = new Usuario();
					$usuarioObj->setUsuario(
						$usuarioDB->id,
						$usuarioDB->nombres,
						$usuarioDB->apellidos,
						$usuarioDB->nUsuario,
						$usuarioDB->correo,
						$usuarioDB->estado
					);
					return $usuarioObj;
				}else{
					return null;
				}
			}else{
				return null;
			}
		}
		public static function getTodosUsuarios(){
			$instanciaUsuario =& get_instance();
			$usuariosDB = null;
			$instanciaUsuario->db->select("*");
			$instanciaUsuario->db->from('Usuario');
			$instanciaUsuario->db->where(array('estado'=>false));
			$usuariosDB=$instanciaUsuario->db->get()->result_array();

			if(!is_null($usuariosDB)){
				$usuariosObj = array();
				foreach ($usuariosDB as $key => $usuario) {
					# code...
					$usuarioObj = Usuario::getUsuarioID($usuario["id"]);
					if(!is_null($usuarioObj)){
						$usuariosObj[$key]=new Usuario();
						$usuariosObj[$key]->setUsuarioObj($usuarioObj);
					}
				}
				return $usuariosObj;
			}else{
				return null;
			}
		}
	}
?>
