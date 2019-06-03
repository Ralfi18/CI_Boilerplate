<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct() { parent::__construct(); }
}

class Public_Controller extends MY_Controller {
	public function __construct()
	{
    parent::__construct();
    echo "Public";
	}
}

class Admin_Controller extends MY_Controller {
	public function __construct()
	{
    parent::__construct();
    if (!isset($_SESSION['logged_in']) && uri_string() !== "backend/login") {
      header("Location: /backend/login");
      exit();
    }
  }

  public function mainLayout($view = null, $vars = null, $resources = [], $title = '')
  {
    if ($view) {
      $data['headeCss'] = $resources['headeCss'];
      $data['headeJs'] = $resources['headeJs'];
      $data['footerJs'] = $resources['footerJs'];
      $data['title'] = $title;
      $data['page'] = $view;
      $data['data'] = $vars;
      $this->load->view('admin/common/main', $data);
    }
  }

  public function login($params = null){
    $this->load->helper('form');
    $resources['headeCss'] = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs'] = null;
    $resources['footerJs'] = ['bootstrap.min.js'];
    $data['login_data'] = 'some data';
    $this->mainLayout('admin/login', $data, $resources, 'Login Page');
    // $this->load->view('admin/login', $data);
  }
}