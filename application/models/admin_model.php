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

/* End of file admin_model.php */
/* Location: ./application/core/admin_model.php */
