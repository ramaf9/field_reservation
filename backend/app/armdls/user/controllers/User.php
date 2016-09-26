<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// importing rest library
require_once APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller{
// Load model in constructor
public function __construct() {
	parent::__construct();
	// load models
	$this->load->model('User_model');
}
// Server's Get user data
public function data_get($id_param = NULL){
	// retrieve data 'email' from get method
	$id = $this->input->get('email');
	// check $id value
	if($id===NULL){
		// set $id with id in parameter
		$id = $id_param;
	}
	// if $id still null
	if ($id === NULL)
	{
		// call method read from user_model
		$data = $this->User_model->read($id);
		// if return true
		if ($data)
		{
			// set success response header
			$this->response($data, REST_Controller::HTTP_OK);
		}
		else
		{
			// set failed response header
			$this->response([
				'status' => FALSE,
				'error' => 'No users were found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	// call method read from user_model
	$data = $this->User_model->read($id);
	// if return true
	if ($data)
	{
		// set success response header
		$this->set_response($data, REST_Controller::HTTP_OK);
	}
	else
	{
		// set failed response header
		$this->set_response([
			'status' => FALSE,
			'error' => 'Record could not be found'
		], REST_Controller::HTTP_NOT_FOUND);
	}
}
// Server's Post/Create user
public function data_post(){
	// retrieve data 'input' from post method
	$input = $this->input->post('input');
	// call check_username from user_model
	$create = $this->User_model->check_username($input['email']);
	// if return true
	if ($create) {
		// set data equals to input
		$data = array(
			'u_email' => $input['email'],
			'u_password' => $input['password'],
			'u_role' => $input['role'],
			'u_name' => $input['name']
		);
		// call insert from user_model
		$this->User_model->insert($data);
		// set message as success
		$message = [
			'status' => TRUE,
			'message' => $data['u_email'].' created'
		];
		// set response header http_created
		$this->set_response($message, REST_Controller::HTTP_CREATED);
	}
	else{
		// set message as failed
		$message = [
			'status' => FALSE,
			'message' => $data['u_email'].' already exist'
		];
		// set response header http_ok
		$this->set_response($message, REST_Controller::HTTP_OK);
	}



}
// Server's Put/update user
public function data_put(){
	$data = $this->input->input_stream();
	$this->User_model->update($data);
	$message = [
		'status' => TRUE,
		'message' => $data['u_name'].' updated'
	];
	$this->set_response($message, REST_Controller::HTTP_CREATED);
}
// Server's Delete user
public function data_delete(){
	// retrieve data from segment 3 (/)
	$id = $this->uri->segment(3);
	// if $id is null
	if($id===NULL){
		// set failed response header
		$this->set_response([
			'status' => FALSE,
			'error' => 'ID cannot be empty'
		], REST_Controller::HTTP_NOT_FOUND);
	}
	// call delete from user_model
	$data = $this->User_model->delete($id);
	// if return true
	if ($data)
	{
		// set success response header
		$this->set_response($data, REST_Controller::HTTP_OK);
	}
	else
	{
		// set failed response header
		$this->set_response([
			'status' => FALSE,
			'error' => 'Record could not be found'
		], REST_Controller::HTTP_NOT_FOUND);
	}
}
// Login with post method
public function login_post(){
	// retrieve data from post
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$message = [];

	// check if either $username or $password is null
	if ($username===NULL || $password===NULL ) {
		# code...
	}
	// call check_password from user_model
	$data = $this->User_model->check_password($username,$password);
	// if return true
	if ($data) {
		// set message as true
		$message = [
			'status' => TRUE,
			'message' => 'Login success'
		]
	}
	else{
		// set message as failed
		$message = [
			'status' => FALSE,
			'message' => 'Login failed'
		]
	}
	// set response header
	$this->set_response($message, REST_Controller::HTTP_OK);

}
}
