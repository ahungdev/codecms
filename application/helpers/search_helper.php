<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('url_encode'))
{
  function url_encode(&$str = '')
  {
    return strtr(
      base64_encode($str),
      array(
        '+' => '.',
        '=' => '-',
        '/' => '~',
      )
    );
  }
}

if (!function_exists('url_decode'))
{
  function url_decode(&$str = '')
  {
    return base64_decode(
      strtr(
        $str,
        array(
          '.' => '+',
          '-' => '=',
          '~' => '/',
        )
      )
    );
  }
}

if (!function_exists('get_search'))
{
  function get_search($search_type)
  {
    $ci =& get_instance();
    if ($ci->input->post('clear-search'))
    {
      $ci->session->unset_userdata('search[\'' . $search_type . '\']');
      redirect(current_url());
    }
    else
    {
      if ($filter = $ci->input->post('search'))
      {
        foreach ($filter as $key => $value)
        {
          if ($value == '')
          {
            unset($filter[$key]);
          }
        }
        $ci->session->set_userdata('search[\'' . $search_type . '\']', $filter);
        redirect(current_url());
      }
    }
    $search = ($ci->session->userdata('search[\'' . $search_type . '\']')) ? $ci->session->userdata('search[\'' . $search_type . '\']') : [];
    return $search;
  }
}

if (!function_exists('set_search'))
{
  function set_search($search_type, $search)
  {
    $ci = &get_instance();
    $search_array = $ci->session->userdata('search[\'' . $search_type . '\']');

    if (isset($search_array[$search]))
    {
      return $search_array[$search];
    }
    else
    {
      return '';
    }
  }
}

if (!function_exists('segment'))
{
  function segment($num)
  {
    $ci = &get_instance();
    return $ci->uri->segment($num);
  }
}

// End of file: search_helper.php
// Location: ./system/application/helpers/search_helper.php
