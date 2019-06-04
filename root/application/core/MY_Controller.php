<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Base controller
 */ 
class MY_Controller extends CI_Controller {
	public function __construct() { parent::__construct(); }
}
/*
 * Public area base controller extendig the basic controller
 */ 
class Public_Controller extends MY_Controller {
	public function __construct()
	{
    parent::__construct();
	}
}
/*
 * Admin base controller extendig the basic controller
 */ 
class Admin_Controller extends MY_Controller {
  // protected $session = null;
  public function __construct()
	{
    parent::__construct();
    // libs
    $this->load->library('session');
    $this->load->library('layout_generator');
    // helpers
    $this->load->helper('form');
    $alowedRoutes = ["backend/login", "backend/validateLogin", "backend/logout"];
    if ($this->session->time && $this->session->time < time()) {
      $this->session->sess_destroy();
      redirect("backend/login");
      exit();
    }
    if (!$this->session->logged_in && !in_array(uri_string(), $alowedRoutes)){
      redirect("backend/login");
      exit();
    } else {
      if(!$this->session->time) {
        $this->session->set_userdata('time', time() + (60*5));
        redirect("admin");
      }
    }
  }

  public function login($params = null)
  {
    // print_r(password_hash('123', PASSWORD_DEFAULT));
    $resources['headeCss'] = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs'] = null;
    $resources['footerJs'] = ['bootstrap.min.js'];
    $data['login_data'] = 'some data';
    $data['login_error'] = $this->session->flashdata('login-error');
    $pages = 'admin/login';
    $this->layout_generator->init($pages, $data, $resources, 'Login Page', 'admin/common/main');
  }

  protected function returnToLogin($falsh = null)
  {
    if ($falsh) {
      $this->session->set_flashdata($falsh['name'], $falsh['value']);
    }
    redirect('/backend/login');
  }

  public function validateLogin()
  {
    $this->load->library('form_validation');
    $this->load->model('user_model');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
    // Create user session
    if ($this->form_validation->run() === TRUE) {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->user_model->getUser($email);
      if ($user) {
        var_dump(password_verify($password, $user['password']));
        if (password_verify($password, $user['password'])) {
          $this->session->set_userdata('user_name', 'Rali Dimitrov');
          $this->session->set_userdata('logged_in', true);
          redirect("admin");
        } else {
          $this->returnToLogin(['name'=>'login-error', 'value' => 'Please try again!']);
        }
      } else {
        $this->returnToLogin(['name'=>'login-error', 'value' => 'You are not allowed!']);
      }
    } else {
      $this->returnToLogin(['name'=>'login-error', 'value' => validation_errors()]);
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->returnToLogin();
  }
}