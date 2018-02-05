<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
	public function index()
	{
		$data['title']    = 'Settings';
		$data['template'] = 'admin/settings/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */