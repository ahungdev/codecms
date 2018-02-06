<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['title']    = 'Posts';
		$data['template'] = 'admin/posts/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */
