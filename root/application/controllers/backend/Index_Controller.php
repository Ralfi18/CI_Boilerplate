<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Controller extends Admin_Controller {

  public function index()
  {
    $resources['headeCss'] = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs'] = null;
    $resources['footerJs'] = ['bootstrap.min.js'];
    $data['user_name'] = $this->session->user_name;
    // $data['login_error'] = $this->session->flashdata('login-error');
    $pages = 'admin/index';
    $this->layout_generator->init($pages, $data, $resources, 'Login Page', 'frontend/common/');
  }
}
