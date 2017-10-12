<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	public function index()
	{
		$this->template->set_layout('backend')
						->title('Home - Welcome Home')
						->build('v_home');
	}

}

/* End of file Home.php */
/* Location: ./application/modules/welcome/controllers/Home.php */