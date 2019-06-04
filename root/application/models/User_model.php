<?php

class User_model extends CI_Model {

  public $id;
  public $name;
  public $email;
  public $password;
  
  public function getUser($email = null)
  {
    $query = $this->db->get_where('users', ['email' => $email]);
    return $query->row_array();
  }
}