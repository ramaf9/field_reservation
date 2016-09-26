<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
// Read Query
public function read($id){
	if($id===NULL){
		$replace = "" ;
	}
	else{
		$replace = "=$id";
	}
	// query get data from table user
	$query = $this->db->query("select * from user where u_email".$replace);
	// return query result as array
	return $query->result_array();
}
// Insert/Create Query
public function insert($data){
	// inserting data to table users
	$this->db->insert('users', $data);
	return TRUE;
}
// Delete Query
public function delete($id){
	// deleting data from table users
	$query = $this->db->query("delete from users where u_email=$id");
	return TRUE;
}
// Update Query
public function update($data){
	// get email from array data
	$id= $data['email'];
	// set query where u_email=$id
	$this->db->where('u_email',$id);
	// update users table data
	$this->db->update('users',$data);
}
// method to check username exist
public function check_username($username){
	// check if username is null
	if($username===NULL){
		$replace = "" ;
	}
	else{
		$replace = "=$username";
	}
	// query get data from table users
	$query = $this->db->query("select * from users where u_email".$replace);
	// check if query result is only 1 row
	if ($query->num_rows() > 0) {
		return FALSE;
	}
	else{
		return TRUE;
	}
}
// method to check login
public function check_password($username,$password){
	// query get data from table users
	$query = $this->db->query("select * from users where u_email".$replace." AND u_password=".$password);
	// check if query result is not 1 row
	if ($query->num_rows() != 1) {
		return FALSE;
	}
	else{
		return TRUE;
	}
}
}
