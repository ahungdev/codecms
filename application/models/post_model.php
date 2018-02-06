<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Model extends MY_Model
{
    protected $_table = 'posts';

	public function __construct()
    {
        parent::__construct();
	}
}

/* End of file post_model.php */
/* Location: ./application/core/post_model.php */
