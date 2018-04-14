<?php 

/**
* 
*/
class Auth extends CI_Controller{
	
	public function login(){

		$this->form_validation->set_rules('login', 'Login', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if($this->form_validation->run() == TRUE){

			$email = $_POST['login'];
			$senha = $_POST['senha'];

			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where("nome", $email);

			$query = $this->db->get();
			$user = $query->row();

			if(!empty($user)){
				if(password_verify($senha, $user->senha)){
					$this->session->set_flashdata("success", "Seja bem vindo");
					$_SESSION['usuario_logged'] = TRUE;
					$_SESSION['usuario_id'] = $user->id;
					$_SESSION['usuario_nome'] = $user->nome;

					redirect('litologia');

				}
			}else{
				$this->session->set_flashdata("error", "Dados incorretos ou usuário inexistente");
				redirect('login');
			}

		}

		$this->load->view('login/index');

	}

	public function logout(){

		unset($_SESSION);
		session_destroy();
		redirect('login');

	}

}

?>