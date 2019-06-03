<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct()
	{
    parent::__construct();
    echo 'MY_Controller';
    echo "\n";
	}
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
    echo "Admin";

	}
}