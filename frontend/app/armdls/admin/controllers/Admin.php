<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
    	$this->load->model('home_models');
			$this->load->helper('cookie');


					$config = array('server'            => REST_URL,
					                //'api_key'         => 'Setec_Astronomy'
					                //'api_name'        => 'X-API-KEY'
					                //'http_user'       => 'username',
					                //'http_pass'       => 'password',
					                //'http_auth'       => 'basic',
					                //'ssl_verify_peer' => TRUE,
					                //'ssl_cainfo'      => '/certs/cert.pem'
					                );

					// Run some setup
					$this->rest->initialize($config);
	}

	public function index(){
		$this->load->view('login');
	}

	public function paymentlist(){
		$this->load->view('header');
		$this->load->view('paymentlist');
		$this->load->view('footer');
	}

	public function landing(){
		$this->load->library('cart');
		if($this->input->server('REQUEST_METHOD')=='GET'){
				$time = $this->input->get('time');
				$id = $this->input->get('id');
				$date = $this->input->get('date');
			if (!empty($id) && !empty($time)) {
				$book = [];
				if ($this->session->has_userdata('booked')) {
					$book = $this->session->booked;
					$data['book'] = $book;
				}
				$array = [
					'id' => $id,
					'date' => $date,
					'time' => $time
				];
				if (!in_array($array, $book)) {

					array_push($book,$array);
				}
				$data['book'] = $book;
				$this->session->set_userdata('booked',$data['book']);
				// $this->session->sess_destroy();
			}


			$date = date("Y-m-d", strtotime($date));
			$data['date'] = $date;

				if (!empty($date)) {
				$this->rest->format('application/json');
				$result = $this->rest->get('transaction/available?input[t_date]='.$date);
				$data['schedule'] = json_decode(json_encode($result), true);
				$data['time'] = [
					'1:00','2:00','3:00','4:00','5:00','6:00','7:00','8:00','9:00',
					'10:00','11:00','12:00','13:00','14:00','15:00','17:00',
					'18:00','19:00','20:00','21:00','22:00','23:00','24:00',
				];


			}
			$this->load->view('header',$data);
			$this->load->view('schedule');
			$this->load->view('footer');
		}
	}
	// public function index(){
	// 	if ($this->session->userdata('logged_in')) {
	// 		$role = $this->session->userdata('role');
	// 		$this->redirectUser($role);
	// 	}
	//
	// 	else if($this->input->server('REQUEST_METHOD')=='GET'){
	// 		$this->load->view('login');
	// 	}
	//
	// 	else if($this->input->server('REQUEST_METHOD')=='POST'){
	// 		$this->rest->format('application/json');
	// 		$params['input'] = $this->input->post(NULL,TRUE);
	// 		$user = $this->rest->post('user/login', $params,'');
	// 		$user = json_decode(json_encode($user), true);
	//
	// 		if ($user['status']) {
	// 		$role = $user['data']['role'];
	// 		$this->session->set_userdata($user['data']);
	// 		$this->redirectUser($role);
	// 		}
	//
	// 		else{
	// 		$message = "User/password salah";
	// 		echo "<script type='text/javascript'>alert('$message');</script>";
	// 		$this->load->view('login');
	// 		}
	// 	}
	// }

	// public function viewSchedule(){
	// 	if($this->input->server('REQUEST_METHOD')=='GET'){
	// 		$this->load->view('schedule');
	// 	}else if($this->input->server('REQUEST_METHOD')=='POST'){
	// 		$this->rest->format('application/json');
	// 		$params['input'] = $this->input->post(NULL,TRUE);
	// 		$user = $this->rest->get('transaction/available', $params,'');
	// 		$user = json_decode(json_encode($user), true);
	// 	}
	// }

	public function viewSchedule(){
		$this->load->view('header');
		$this->load->view('schedule');
		$this->load->view('footer');
	}

	public function updateSchedule(){

	}

	public function deleteSchedule(){

	}

	public function listpayment()
	{
		$this->load->view('listpayments');
	}

	public function checkout()
	{
		$this->load->view('header');
		$this->load->view('checkout');
		$this->load->view('footer');
	}

	public function invoice()
	{
		$this->load->view('header');
		$this->load->view('invoice');
		$this->load->view('footer');
	}

  function __encrip_password($password) {
        return md5($password);
    }


}
