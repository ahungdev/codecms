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

if (!function_exists('process_filter'))
{
  function process_filter($filter_type)
  {
    $ci =& get_instance();
    if ($ci->input->post('clear-filter'))
    {
      $ci->session->unset_userdata('filter[\'' . $filter_type . '\']');
      redirect(current_url());
    }
    else
    {
      if ($filter = $ci->input->post('filter'))
      {
        foreach ($filter as $key => $value)
        {
          if ($value == '')
          {
            unset($filter[$key]);
          }
        }
        $ci->session->set_userdata('filter[\'' . $filter_type . '\']', $filter);
        redirect(current_url());
      }
    }
    $filter = ($ci->session->userdata('filter[\'' . $filter_type . '\']')) ? $ci->session->userdata('filter[\'' . $filter_type . '\']') : array();
    return $filter;
  }
}

if (!function_exists('set_filter'))
{
  function set_filter($filter_type, $filter)
  {
    $ci = &get_instance();
    $filter_array = $ci->session->userdata('filter[\'' . $filter_type . '\']');

    if (isset($filter_array[$filter]))
    {
      return $filter_array[$filter];
    }
    else
    {
      return '';
    }
  }
}

// End of file: encode_helper.php
// Location: ./system/application/helpers/encode_helper.php
