<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function is_logged_in()
{
    $CI =& get_instance();
    $user = $CI->session->userdata('admin_login');

    if ($user)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

/* End of file login_helper.php */
/* Location: ./application/helpers/login_helper.php */