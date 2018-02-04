<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Web
{
	public function index()
	{
		$data['title']    = 'Home';
		$data['template'] = 'web/home/index';
		$data['js']       = 'web/js';
		$this->load->view('web/app/master', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */