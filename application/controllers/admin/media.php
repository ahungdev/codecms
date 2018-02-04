<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends Admin
{
    public function __construct()
    {
		parent::__construct();
		$this->_URL_MEDIA = base_url() . 'uploads';
		$this->_DIR_MEDIA = realpath(APPPATH . '../uploads');
    }
    
	public function index()
	{
		if ($this->input->get('search'))
		{
			$search = $this->input->get('search');
		}
		else
		{
			$search = '';
		}

		if ($this->input->get('directory'))
		{
			$directory = $this->_DIR_MEDIA . '/' . $this->input->get('directory');
		}
		else
		{
			$directory = $this->_DIR_MEDIA;
		}

		if ($this->input->get('page'))
		{
			$page = $this->input->get('page');
		}
		else
		{
			$page = 1;
		}

		$directories    = glob($directory . '/' . $search . '*', GLOB_ONLYDIR);
		$files = glob($directory . '/' . $search . '*.{jpg,jpeg,png,gif,mp4,ogg,webm,pdf,JPG,JPEG,PNG,GIF}', GLOB_BRACE);

		$media       = array_merge($directories, $files);
		$image_total = count($media);
		$items       = array_splice($media, ($page - 1) * 8, 8);
		$lists       = [];

		foreach ($items as $item)
		{
			$name = basename($item);

			if (is_dir($item))
			{
				$url = '';
				if ($this->input->get('target'))
				{
					$target = $this->input->get('target');
				}

				if ($this->input->get('thumb'))
				{
					$thumb = $this->input->get('thumb');
				}
				
				$lists[] = [
					'name' => $name,
					'type' => 'directory',
					'path' => 'uploads/' . substr($item, strlen($this->_DIR_MEDIA . '/')),
					'href' => site_url('admin/media?action=upload&directory=' . substr($item, strlen($this->_DIR_MEDIA . '/')) . $url)
				];
			}
			else if (is_file($item))
			{
				$lists[] = [
                    'name' => $name,
					'type' => 'image',
					'path' => 'uploads/' .substr($item, strlen($this->_DIR_MEDIA . '/')),
					'href' => $this->_URL_MEDIA . '/' . substr($item, strlen($this->_DIR_MEDIA . '/'))
                ];
			}
		}

		$url = '';

		if ($this->input->get('directory'))
		{
			$pos = strrpos($this->input->get('directory'), '/');
			
			if ($pos)
			{
				$url .= '&directory=' . urlencode(substr($this->input->get('directory'), 0, $pos));
			}
		}

		if ($this->input->get('target'))
		{
			$url .= '&target=' .$this->input->get('target');
		}

		if ($this->input->get('thumb'))
		{
			$url .= '&thumb=' . $this->input->get('thumb');
		}

		$data['parent'] = site_url('admin/media?action=upload' . $url);

		$url = '';

		if ($this->input->get('directory'))
		{
			$url .= '&directory=' . urlencode($this->input->get('directory'));
		}

		if ($this->input->get('target'))
		{
			$url .= '&target=' .$this->input->get('target');
		}

		if ($this->input->get('thumb'))
		{
			$url .= '&thumb=' . $this->input->get('thumb');
		}

		$data['refresh'] = site_url('admin/media?action=upload' . $url);

		$number                      = 8;
		$total_rows                  = $image_total;
		$config                      = $this->paging->create($total_rows, $number, site_url('admin/media?action=upload' . $url), 3);
		$config['page_query_string'] = TRUE;
		$config['use_page_numbers']  = TRUE;
		$config['query_string_segment'] = 'page';
		$this->pagination->initialize($config);
		$data['lists']    = $lists;
		$data['title']    = 'Media';
		$data['template'] = 'admin/media/index';
		$data['js']       = 'admin/js';
		$this->load->view('admin/app/master', $data);
    }
}

/* End of file media.php */
/* Location: ./application/controllers/media.php */