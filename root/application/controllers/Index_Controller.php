<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Controller extends Public_Controller {

  public function index($segment_1 = null, $segment_2 = null, $segment_3 = null)
  {
    /**
     *  Check if method exist 
     *  and if exists use it 
     */
    // if(method_exists($this, $segment_1.'Action')) {
    //   $this->{$segment_1 . 'Action'}( $segment_2, $segment_3 );
    //   return;
    // }
    // if ($segment_1 && !method_exists($this, $segment_1.'Action')) {
    //   $this->{'show404'}();
    //   return;
    // }

    $resources['headeCss'] = ['bootstrap.min.css', 'main.css'];
    $resources['headeJs'] = null;
    $resources['footerJs'] = ['bootstrap.min.js'];
    $data['login_data'] = 'some data';
    // $data['login_error'] = $this->session->flashdata('login-error');
    $pages = 'frontend/index';
    $this->layout_generator->init($pages, $data, $resources, 'Login Page', 'frontend/common/');
  }
  
  public function testAction($var = null, $var_2 = null)
  {
    echo 'test';
    echo "</br>";
    echo $var;
  }

  public function blogAction($var = null, $var_2 = null)
  {
    echo 'blog';
    echo "</br>";
    echo $var;
  }

  public function show404() {
    echo '404 page';
  }
}
