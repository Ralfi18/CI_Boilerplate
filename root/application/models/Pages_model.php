<?php

class Pages_model extends CI_Model {

  // public $id;
  // public $name;
  // public $email;
  // public $password;
  
  public function getPage($page_title = null)
  {
    $query = $this->db
      ->from("pages as p")
      ->where('label', $page_title)
      // ->get_where('pages', ['label' => $page_title])
      ->join('content as c', 'c.page_id = p.id', 'left')
      ->get();
      // debug_helper($query);
    return $query->row_array();
  }
}