<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
	public function index()
	{
		$data['title']    = 'Posts';
		$data['template'] = 'admin/posts/index';
		$data['js']       = 'admin/js';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */