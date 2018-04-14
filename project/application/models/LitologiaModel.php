<?php 

/**
* 
*/
class LitologiaModel extends CI_Model{
	
	public function __construct(){
		
	}

	public function create(){
		$data = array(
			'nome' => uniqid()
		);
		$this->db->insert('litologia',$data);
		return true;
	}

	public function getLitologiaAtiva(){
		$this->db->select('id');
		$this->db->from('litologia');
		$this->db->where('fechada',0);
		$query = $this->db->get();

		if(!empty($query->result_array()[0]['id'])){
			return $query->result_array()[0]['id'];
		}
		return 0;
	}

	public function getTamanho($id){
		$this->db->select('tamanho');
		$this->db->from('litologia');
		$this->db->where('id',$id);
		$query = $this->db->get();

		if(!empty($query->result_array()[0]['tamanho'])){
			return $query->result_array()[0]['tamanho'];
		}
		return 0;
	}

	public function setTamanho($id, $tamanho){
		
		$data = array(
			'tamanho' => $this->getTamanho($id) + $tamanho
		);

		$this->db->where('id',$id);
		$this->db->update('litologia',$data);
		return true;
	}

	public function setStatus($litologia, $status){
		
		$data = array(
			'fechada' => $status
		);

		$this->db->where('id',$litologia);
		$this->db->update('litologia',$data);
		return true;
	}

	public function getSolosLitologia($id){
		$this->db->select('*');
		$this->db->from('litologia_solos');
		$this->db->where('litologia',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getLastSize($id){
		$this->db->select('inicio, fim');
		$this->db->from('litologia_solos');
		$this->db->where('litologia',$id);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if(!empty($query->result_array()[0])){
			return $query->result_array()[0];
		}
		return array();
	}

}
?>