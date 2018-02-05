<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
	public function index()
	{
		$data['title']    = 'Users';
		$data['template'] = 'admin/users/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */