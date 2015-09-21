<?php
class Blog extends CI_Controller {

	public function index()
	{
		$data['title'] = "My Blog";
		$data['heading'] = "Welcome to My Blog!";
		$data['query'] = $this->db->get('entries');

		$this->load->view('header');
		$this->load->view('blogview', $data);
		$this->load->view('footer');		
	}
}			
?>


