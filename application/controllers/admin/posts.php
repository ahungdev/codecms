<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends Admin
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('category_model');
    }

	public function index($paging = 0)
	{
        $where_post   = get_search('posts');
		$total_number = $this->post_model->count_by($where_post);
		$num_of_page  = 10;
		$config       = $this->paging->create($total_number, $num_of_page, base_url() . 'admin/posts', 3);
		$this->pagination->initialize($config);
		$rows         = $this->post_model->get_list_by($num_of_page, $paging, $where_post);
		$num_pages    = (ceil($paging / $num_of_page) + 1) * $num_of_page - ($num_of_page - count($rows));

        if (count($rows) <= 0 && $paging != 0)
        {
			redirect('admin/posts', 'refresh');
		}

		$flash_success = $this->session->flashdata('flash_message');

        if (isset($flash_success) && !empty($flash_success))
        {
			$data['flash'] = $flash_success;
		}

		$data['home']     = TRUE;
        $data['export']   = TRUE;
		$data['lists']    = $rows;
		$data['total']    = $total_number;
		$data['num']      = $num_pages;
		$data['curr']     = $num_of_page;
		$data['title']    = 'Posts';
		$data['template'] = 'admin/posts/index';
		$data['script']   = 'admin/script';
        $this->load->view('admin/app/master', $data);
    }

    public function create()
	{
        $data['button']   = TRUE;
        $data['category'] = $this->category_model->fetch_all();
		$data['title']    = 'Create Post';
		$data['template'] = 'admin/posts/create';
		$data['script']   = 'admin/script';

        $this->form_validation->set_error_delimiters('<p><i class="fa fa-times-circle"></i> ', '</p>')
			->set_rules('post-title', 'Title', 'trim|required')
            ->set_rules('post-slug', 'Slug', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = [
                'title'       => $this->input->post('post-title'),
                'slug'        => $this->input->post('post-slug'),
                'intro'       => $this->input->post('post-intro'),
                'content'     => $this->input->post('post-content'),
                'thumbnail'   => $this->input->post('post-thumbnail'),
                'category_id' => $this->input->post('post-cateogry'),
                'status'      => $this->input->post('post-status')
			];

			$result = $this->post_model->create($data);
			$this->session->set_flashdata('flash_message', 'The post added.');
			redirect('admin/posts');
		}

		$this->load->view('admin/app/master', $data);
    }

    public function edit($id = 0)
	{
        $where_post = [
            'id' => $id
        ];

		$item = $this->post_model->find_by($where_post);

        if (count($item) <= 0)
        {
			redirect('admin/posts');
		}

        $data['button']   = TRUE;
		$data['category'] = $this->category_model->fetch_all();
		$data['item']     = $item;
		$data['title']    = 'Edit Post';
		$data['template'] = 'admin/posts/edit';
		$data['script']   = 'admin/script';

        $this->form_validation->set_error_delimiters('<p><i class="fa fa-times-circle"></i> ', '</p>')
			->set_rules('post-title', 'Title', 'trim|required');

		if ($this->form_validation->run() == TRUE)
        {
			$data_post = [
                'title'       => $this->input->post('post-title'),
                'slug'        => $this->input->post('post-slug'),
                'intro'       => $this->input->post('post-intro'),
                'content'     => $this->input->post('post-content'),
                'thumbnail'   => $this->input->post('post-thumbnail'),
                'category_id' => $this->input->post('post-cateogry'),
                'status'      => $this->input->post('post-status'),
                'updated_at'  => date('Y-m-d H:i:s', now())
			];

			$result = $this->post_model->update($data_post, $where_post);

            if ($result)
            {
                $this->session->set_flashdata('flash_message', 'The user was updated.');
      			redirect('admin/posts');
			}
		}

		$this->load->view('admin/app/master', $data);
    }

    public function destroy()
	{

    }
}

/* End of file posts.php */
/* Location: ./application/controllers/posts.php */
