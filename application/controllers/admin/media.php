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

		$directories = glob($directory . '/' . $search . '*', GLOB_ONLYDIR);
		$files       = glob($directory . '/' . $search . '*.{jpg,jpeg,png,gif,mp4,ogg,webm,pdf,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
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

		$data['lists'] = $lists;

		if ($this->input->get('search'))
		{
			$data['search'] = $this->input->get('search');
		}
		else
		{
			$data['search'] = '';
		}

		if ($this->input->get('directory'))
		{
			$data['directory'] = urlencode($this->input->get('directory'));
		}
		else
		{
			$data['directory'] = '';
		}

		if ($this->input->get('thumb'))
		{
			$data['thumb'] = $this->input->get('thumb');
		}
		else
		{
			$data['thumb'] = '';
		}

		if ($this->input->get('target'))
		{
			$data['target'] = $this->input->get('target');
		}
		else
		{
			$data['target'] = '';
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

		$data['parent'] = site_url('admin/media?action=parent' . $url);

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

		$data['refresh'] = site_url('admin/media?action=refresh' . $url);

		$number                      = 8;
		$total_rows                  = $image_total;
		$config                      = $this->paging->create($total_rows, $number, site_url('admin/media?action=showall' . $url), 3);
		$config['page_query_string'] = TRUE;
		$config['use_page_numbers']  = TRUE;
		$config['query_string_segment'] = 'page';
		$this->pagination->initialize($config);
		$data['title']    = 'Media';
		$data['template'] = 'admin/media/index';
		$data['script']   = 'admin/script';
		$this->load->view('admin/app/blank', $data);
	}


    public function upload()
    {
		$response = [];

		if ($this->input->get('directory'))
		{
			$directory = $this->_DIR_MEDIA . '/' . $this->input->get('directory');
		}
		else
		{
			$directory = $this->_DIR_MEDIA;
        }

        if (is_dir($directory))
		{
			$config['upload_path'] = $directory;
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file'))
			{
				$response = [
					'success' => true,
					'message' => 'Upload file success.'
				];
			}
			else
			{
				$response = [
					'success' => false,
					'message' => 'The file is not formatted correctly.'
				];
			}
        }
        else
        {
            $response = [
				'success' => false,
				'message' => 'Folder does not exist.'
            ];
        }

        header("Content-Type: application/json");
		echo utf8_encode(json_encode($response));
    }

    public function folder()
    {
        if ($this->input->get('directory'))
        {
            $directory = $this->_DIR_MEDIA . '/' . $this->input->get('directory');
        }
        else
        {
            $directory = $this->_DIR_MEDIA;
        }

        if (is_dir($directory))
        {
            $folder = $this->input->post('folder');

            if ((strlen($folder) < 3) || (strlen($folder) > 128))
            {
                $response = [
                    'success' => false,
                    'message' => 'The directory name is invalid.'
                ];
            }
            else if (is_dir($directory . '/' . $folder))
            {
                $response = [
                    'success' => false,
                    'message' => 'Folder already exists.'
                ];
            }
            else
            {
                mkdir($directory . '/' . $folder, 0777);

                $response = [
                    'success' => true,
                    'message' => 'Add folder success.'
                ];
            }
        }
        else
        {
            $response = [
                'success' => false,
                'message' => 'Folder error.'
            ];
        }

        header("Content-Type: application/json");
		echo utf8_encode(json_encode($response));
    }

    public function delete()
    {
		$response = [];

        if ($this->input->post('path'))
        {
            $paths = $this->input->post('path');
        }

        foreach($paths as $path)
        {
            $path = rtrim($this->_DIR_MEDIA . str_replace(['../', '..\\', '..'], '', $path), '/');

            if ($path == $this->_DIR_MEDIA)
            {
                $response = [
                    'success' => false,
                    'message' => 'Incorrect path.'
                ];
            }
            break;
        }

        foreach($paths as $path)
        {
            $path = rtrim(str_replace(['../', '..\\', '..'], '', $path));

            if (is_file($path))
            {
                unlink($path);
            }
            else if (is_dir($path))
            {
                $files = [];
                $path = [
                    $path . '*'
                ];

                while (count($path) != 0)
                {
                    $next = array_shift($path);
                    foreach (glob($next) as $file)
                    {
                        if (is_dir($file))
                        {
                            $path[] = $file . '/*';
                        }
                        $files[] = $file;
                    }
                }

                rsort($files);

                foreach ($files as $file)
                {
                    if (is_file($file))
                    {
                        unlink($file);
                    }
                    else if (is_dir($file))
                    {
                        rmdir($file);
                    }
                }
            }
        }

        $response = [
            'success' => true,
            'message' => 'Delete success.'
        ];

        header("Content-Type: application/json");
		echo utf8_encode(json_encode($response));
    }
}

/* End of file media.php */
/* Location: ./application/controllers/media.php */
