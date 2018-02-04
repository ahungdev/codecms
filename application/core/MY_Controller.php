<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if (!is_logged_in())
        {
            redirect('admin/login');
        }
    }
}

class Web extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */