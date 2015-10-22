<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

	// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');
	}

	// Show login page
	public function index() {
		$this->load->view('login');
		$this->load->view('footer');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('register');
		$this->load->view('footer');
	}

	// Validate and store registration data in database
	public function new_user_registration() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
			$this->load->view('footer');
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);
			
			$result = $this->login_database->registration_insert($data);
			
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('register', $data);
				$this->load->view('footer');
			}
		}
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin_page');
				$this->load->view('footer');
			
			} else{
				$this->load->view('login');
				$this->load->view('footer');
		}
			
		} else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				
				if ($result != false) {
					$session_data = array(
					'username' => $result[0]->username,
					'email' => $result[0]->email,
					);
					
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('admin_page');

					//Blog view
					$data['title'] = "My Blog";
					$data['heading'] = "Welcome to My Blog!";
					$data['query'] = $this->db->get('entries');

					$this->load->view('blogview', $data);
					$this->load->view('footer');
				}
			
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login', $data);
				$this->load->view('footer');
			}
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
		$this->load->view('footer');
	}


	public function post($id)
{
    $data['query'] = $this->login_model->get_post($id);
    $data['comments'] = $this->login_model->get_post_comment($id);
    $data['post_id'] = $id;
    $data['total_comments'] = $this->login_model->total_comments($id);
 
    $this->load->helper('form');
    $this->load->library(array('form_validation','session'));
 
    //set validation rules
    $this->form_validation->set_rules('commentor', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('comment', 'Comment', 'required');
 
    if($this->login_model->get_post($id))
    {
        foreach($this->login_model->get_post($id) as $row)
        {
            //set page title
            $data['title'] = $row->entry_name;
        }
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('user_authentication/post',$data);
        }
        else
        {
            //if valid
            $name = $this->input->post('commentor');
            $email = strtolower($this->input->post('email'));
            $comment = $this->input->post('comment');
            $post_id = $this->input->post('post_id');
 
            $this->login_model->add_new_comment($post_id,$name,$email,$comment);
            $this->session->set_flashdata('message', '1 new comment added!');
            redirect('post/'.$id);
        }
    }
    else
        show_404();
}
}

?>