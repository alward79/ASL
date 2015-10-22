<?php

Class Login_Database extends CI_Model {

	// Insert registration data in database
	public function registration_insert($data) {

		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('microboard');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('microboard', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function login($data) {

		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('microboard');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('microboard');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	function add_new_comment($post_id,$commentor,$email,$comment)
{
    $data = array(
        'entry_id'=>$post_id,
        'comment_name'=>$commentor,
        'comment_email'=>$email,
        'comment_body'=>$comment,
    );
    $this->db->insert('comment',$data);
}
 
function get_post($id)
{
    $this->db->where('entry_id',$id);
    $query = $this->db->get('entry');
    if($query->num_rows()!==0)
    {
        return $query->result();
    }
    else
        return FALSE;
}
 
function get_post_comment($post_id)
{
    $this->db->where('entry_id',$post_id);
    $query = $this->db->get('comment');
    return $query->result();
}

}

?>