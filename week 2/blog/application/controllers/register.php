<?php

class Register extends CI_Controller {

  public function index()
  {

    $this->load->view('header');
    $this->load->view('register_view');
    $this->load->view('footer');    
  }
}
?>  

