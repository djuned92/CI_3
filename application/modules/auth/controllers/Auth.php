<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth','auth');
	}

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
			$result['erorr'] = 'TRUE';
			$result['message'] = validation_errors();
			$this->load->view('v_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// update last login
			$user = $this->auth->check_login($username);
			$data['last_login'] = date('Y-m-d H:i:s');
			(isset($user['id'])) ? $this->auth->update('users', $data, array('id'=> $user['id'])) : '';
			
			if(!empty($user)) {
				if(password_verify($password, $user['password'])) {
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

			echo json_encode($result);
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