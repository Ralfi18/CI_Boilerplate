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
  protected $_sessionObject = null;
  public function __construct()
   
	{
    parent::__construct();
    $this->load->library('custom_session');
    $this->load->library('layout_generator');
    $this->load->helper('form');
    $this->_sessionObject = $this->custom_session::getInstance();
    $alowedRoutes = ["backend/login", "backend/validateLogin", "backend/logout"];
    if (!isset($_SESSION['logged_in']) && !in_array(uri_string(), $alowedRoutes)){
      header("Location: /backend/login");
      exit();
    }
  }

  /**
   * mainLayout type function
   * params: 
   * $pages: [] || string
   * $data: any
   * $resources: []
   * $title" string
   */
  // DEPRECATED 
  public function mainLayout($view = null, $vars = null, $resources = [], $title = '')
  {
    // TODO: chage to OOP and make to Library make and path to mai layout option (for reuse)
    if ($view) {
      /**
       * resources to be loaded in header and footer
       * $resources['headeCss', 'headeJs', 'footerJs'] : [] || null
       */
      $data['headeCss'] = $resources['headeCss'];
      $data['headeJs']  = $resources['headeJs'];
      $data['footerJs'] = $resources['footerJs'];
      /*
       *  title of the page
       */
      $data['title']    = $title;
      /**
       * pages to be loaded in the main view file 
       * $pages: string || []
       */
      $data['page']     = $view;
      /**
       * data to be loaded in the pages
       * $data: any
       */
      $data['data']     = $vars;
      /**
       *  Load main template width header and footer and inject js, css, title and the current view.
       */ 
      $this->load->view('admin/common/main', $data);
    }
  }

  public function login($params = null)
  {
    $resources['headeCss']  = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs']   = null;
    $resources['footerJs']  = ['bootstrap.min.js'];
    $data['login_data']     = 'some data';
    $pages                  = 'admin/login';
    $this->layout_generator->init($pages, $data, $resources, 'Login Page', 'admin/common/main');
    // $this->mainLayout($pages, $data, $resources, 'Login Page', 'admin/common/main');
    print_r($this->_sessionObject->user);
  }

  public function validateLogin()
  {
    // Create user session
    $this->_sessionObject->user = 'Rali Dimitrov';
  }

  public function logout()
  {
    // destroy user session
    $this->_sessionObject->destroy();
  }
}