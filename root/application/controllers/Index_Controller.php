<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Controller extends Public_Controller {

  public function index()
  {
    $resources['headeCss'] = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs'] = null;
    $resources['footerJs'] = ['bootstrap.min.js'];
    $data['login_data'] = 'some data';
    // $data['login_error'] = $this->session->flashdata('login-error');
    $pages = 'frontend/index';
    $this->layout_generator->init($pages, $data, $resources, 'Login Page', 'frontend/common/');
  }
}
