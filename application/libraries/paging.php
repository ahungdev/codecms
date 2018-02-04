<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paging extends CI_Pagination
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($total, $num, $url, $segment)
	{
		$config['base_url'] = $url;
		$config['total_rows'] = $total;
		$config['per_page'] = $num;
		$config['num_links'] = 2;
		$config['uri_segment'] = $segment;

		$config['first_link'] = '|&lt;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '&gt;|';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		//Current Page
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';

		//Previous
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		//Next
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		//Digit
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		return $config;
	}
}

/* End of file paging.php */
/* Location: ./application/libraries/paging.php */
