<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Controller extends Admin_Controller {

  public function index()
  {
     echo 'admin';
     echo $this->session->user_name;
  }
}
