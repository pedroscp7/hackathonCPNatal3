<?php 

/**
* 
*/
class SoloModel extends CI_Model{
	
	public function __construct(){

	}

	public function getNome($id){
		$this->db->select('solo');
		$this->db->from('solos');
		$this->db->where('id',$id);
		$query = $this->db->get();

		if(!empty($query->result_array()[0]['solo'])){
			return $query->result_array()[0]['solo'];
		}
		return null;
	}

	public function getSolosTratados($id, $ampliado = true, $cabecalho = true, $tampa = true){
		
		$solos = $this->LitologiaModel->getSolosLitologia($id);

		$tamanhoTotal = $this->LitologiaModel->getTamanho($id);

		if($tamanhoTotal == 0){
			$tamanhoTotal = 1;
		}

		if($cabecalho){
			$result = '

			<div id="nav" align="center">
			<img style="max-width:150px;max-height:130px; width: auto; height: auto;" src="'.base_url().'assets/imagens/logo.png">
			</div>
			<div id="produto" style="background-color: black; color: white;" align="center">
			<strong>
			PITSYS
			<br>
			Sistema de Análise de Solos Poços Artesanais
			</strong>
			</div>
			<br>

			<table class="table table-condensed" width="100%" cellspacing="0" align="center">
			';
		}else{
			$result = '
			<table class="table table-condensed" width="100%" cellspacing="0" align="center">
			';
		}

		$count = 0;

		foreach ($solos as $key) {

			$tamanhoOriginal = $key['fim'] - $key['inicio'];

			if($ampliado){
				$tamanhoAmpliado = ($key['fim'] - $key['inicio'])*10;
			}else{
				$tamanhoAmpliado = $key['fim'] - $key['inicio'];
			}

			if($count == 0 AND $tampa){
				$result .= '
				<tr>
				<td align="center" width="20%"></td>
				<td align="center" width="60%"><img src="'.base_url().'assets/imagens/tampa.jpg" height="50px" width="100%"></td>
				<td align="center" width="20%"></td>
				</tr>
				';
			}

			$porcentagem = number_format(($tamanhoOriginal/$tamanhoTotal ) * 100,2,',','.');

			$result .= '
			<tr>
			<td align="center" width="20%">'.$key['inicio'].' a '.$key['fim'].' <br> '.$porcentagem.'% </td>
			<td align="center" width="60%"><img src="'.base_url().'assets/imagens/'.$key['solo'].'.jpg" height="'.$tamanhoAmpliado.'px" width="100%"></td>
			<td align="center" width="20%">'.$this->SoloModel->getNome($key['solo']).'</td>
			</tr>
			';
			$count++;
		}

		$result .= '</table>';

		return $result;

	}


}
?>