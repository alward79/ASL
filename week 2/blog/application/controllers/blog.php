<?php
class Blog extends CI_Controller {

	function index()
	{
		$data['title'] = "My Blog";
		$data['heading'] = "Welcome to My Blog!";
		$data['query'] = $this->db->get('entries');

		$this->load->view('header');
		$this->load->view('blogview', $data);
		$this->load->view('footer');
	}

	public function register() {
		//load form helper for register	
		$this->load->helper('form');
	
		$this->load->view('header');
		$this->load->view('register_view');
		$this->load->view('footer');
		
	}//end register
}	

?>