<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
	public function index()
	{
		$data['title']    = 'Categories';
		$data['template'] = 'admin/categories/index';
		$data['js']       = 'admin/js';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */