<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site
{
  public function __construct()
  {
    $this->ci =& get_instance();
  }

  public function get($name)
  {
    $data = array();
    $where = array('name' => $name);
    $item = $this->ci->db->where($where)
      ->get('settings')
      ->row();

    return $item->value;
  }
}

/* End of file setting.php */
/* Location: ./application/libraries/setting.php */
