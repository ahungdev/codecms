<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['title']    = 'Categories';
		$data['template'] = 'admin/categories/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
