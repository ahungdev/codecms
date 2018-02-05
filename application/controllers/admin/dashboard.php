<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Auth
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    
	public function index()
	{
        if (!is_logged_in())
        {
            redirect('admin/login');
        }

		$data['title']    = 'Dashboard';
		$data['template'] = 'admin/dashboard/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/master', $data);
    }
    
    public function login()
	{
        if (is_logged_in())
        {
            redirect('admin');
        }

        $this->form_validation->set_error_delimiters('<p><i class="fa fa-times-circle" aria-hidden="true"></i> ', '</p>')
            ->set_rules('email', 'email', 'trim|required')
            ->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $email     = $this->input->post('email');
            $password  = $this->input->post('password');

            $where_admin_email = [
                'email' => $email,
            ];

            $admin_email = $this->admin_model->find_by($where_admin_email);

            if (!empty($admin_email))
            {
                $where_admin = [
                    'email'    => $email,
                    'password' => do_hash($password . $admin_email->remember_token)
                ];

                $admin = $this->admin_model->find_by($where_admin);

                if (!empty($admin))
                {
                    $session_admin = [
                        'admin_login' => TRUE,
                        'admin_name'  => $admin->name,
                        'admin_id'    => $admin->id,
                        'admin_level' => $admin->level
                    ];

                    $this->session->set_userdata($session_admin);
                    $this->session->set_flashdata('flash_message', 'You are logged in.');
                    redirect('admin');
                }
                else
                {
                    $data['login_error'] = 'Username or password wrong.';
                }

            }
            else
            {
                $data['login_error'] = 'Username or password wrong.';
            }
        }

		$data['title']    = 'Login';
		$data['script']   = 'admin/script';
		$this->load->view('admin/login/index', $data);
    }
    
    public function logout()
	{
		$this->session->sess_destroy();
        redirect('admin/login', 'refresh');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */