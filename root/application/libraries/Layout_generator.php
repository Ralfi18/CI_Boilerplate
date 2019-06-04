<?php

class Layout_generator {
  protected $CI;

  protected $view;
  protected $vars;
  protected $resources;
  protected $title;
  protected $path;

  public function __construct()
  {
    // Assign the CodeIgniter super-object
    $this->CI =& get_instance();
  }

  public function init($view = null, $vars = null, $resources = [], $title = '', $path = '')
  {
    $this->view      = $view;
    $this->vars      = $vars;
    $this->resources = $resources;
    $this->title     = $title;
    $this->path      = $path;

    $this->layout();
  }

  private function layout()
  {
    if (!$this->view || $this->view === NULL) { return; }
    /**
     * resources to be loaded in header and footer
     * $resources['headeCss', 'headeJs', 'footerJs'] : [] || null
     */
    $data['headeCss'] = $this->resources['headeCss'];
    $data['headeJs']  = $this->resources['headeJs'];
    $data['footerJs'] = $this->resources['footerJs'];
    /**
     * TODO: create data for SEO
     */
    $data['seo'] = NULL;  
    /*
     *  title of the page
     */
    $data['title'] = $this->title;
    /**
     * pages to be loaded in the main view file 
     * $pages: string || []
     */
    $data['page'] = $this->view;
    /**
     * data to be loaded in the pages
     * $data: any
     */
    $data['data'] = $this->vars;
    /**
     *  Load main template width header and footer and inject js, css, title and the current view.
     */ 
    $this->CI->load->view($this->path, $data);
  }
}