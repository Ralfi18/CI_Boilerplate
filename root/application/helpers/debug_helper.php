<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('debug_helper'))
{
  function debug_helper($data = '')
  {
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
    die();
  }   
}