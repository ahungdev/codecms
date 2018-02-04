<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends MY_Model
{
    protected $_table = 'admins';

	public function __construct()
    {
        parent::__construct();
	}
}

/* End of file user_model.php */
/* Location: ./application/core/user_model.php */