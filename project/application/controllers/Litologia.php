<?php

/**
*
*/
class Litologia extends CI_Controller{

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Recife');
		if(!isset($_SESSION['usuario_logged'])){
			redirect('login');
		}
	}

	public function index(){

		$data['solos'] = array();

		$litologia = $this->LitologiaModel->getLitologiaAtiva();

		$lastSize = $this->LitologiaModel->getLastSize($litologia);

		if(!empty($lastSize['fim'])){
			$data['minimo'] = $lastSize['fim'];	
		}else{
			$data['minimo'] = 0;
		}
		
		$data['litologia'] = $litologia;
		$data['soloNormal'] = $this->SoloModel->getSolosTratados($litologia, false, false, false);
		$data['soloAmpliado'] = $this->SoloModel->getSolosTratados($litologia);

		$this->load->view('templates/header');
		$this->load->view('litologia/index', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		
		if(!empty($_POST)){

			$data = array(
				'litologia' => $_POST['litologia'],
				'inicio' => $_POST['inicio'],
				'fim' => $_POST['fim'],
				'solo' => $_POST['solo']
			);

			if($this->db->insert('litologia_solos', $data)){

				$tamanho = $_POST['fim'] - $_POST['inicio'];

				$this->LitologiaModel->setTamanho($_POST['litologia'], $tamanho);

				redirect('litologia');
			}
		}
	}

	public function finish(){

		if(!empty($_POST)){
			$this->LitologiaModel->setStatus($_POST['litologia'], $_POST['status']);
			$this->LitologiaModel->create();
			return true;
		}
		
		
	}

}

?>
