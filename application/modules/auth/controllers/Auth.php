<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function index()
	{
		$this->load->view('v_login');
	}

	public function do_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$option = [
				'cost'	=> 11,
				'salt'	=> mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)
			];	
			$hash = password_hash($password, PASSWORD_BCRYPT, $option);
			
			// update last login
			$user = $this->auth->check_login($email);
			$data['last_login'] = date('Y-m-d H:i:s');
			$this->auth->update('users', $data)->where('id', $user['id']);
			
			if(!empty($user)) {
				if(password_verify($password, $hash)) {
					$sess_data = [
						'logged_in' => TRUE,
						'username'	=> $user['username'],
					];
					$this->session->set_userdata($sess_data);

					$result['error'] = FALSE;
				} else {
					$result['error'] 	= TRUE;
					$result['message'] 	= 'Password salah';
				}
			} else {
				$result['error'] 	= TRUE;
				$result['message']	= 'User tidak sesuai';
			}
		}

	}

	public function do_logout()
	{
		$this->session->sess_destroy();
		redirect($this->index());
	}
}

/* End of file Auth.php */
/* Location: ./application/modules/auth/controllers/Auth.php */