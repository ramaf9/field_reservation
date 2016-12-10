<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

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
		if ($this->session->has_userdata('login')) {
			redirect(base_url().'superadmin/landing');
		}
		if($this->input->server('REQUEST_METHOD')=='GET'){
			$this->load->view('login');
		}
		else if($this->input->server('REQUEST_METHOD')=='POST'){
			$params['input'] = $this->input->post('user');
			$result = $this->rest->post('user/login',$params);
			$data['user'] = json_decode(json_encode($result), true);
			$this->session->set_userdata('login',$data['user']);
			// echo json_encode($data['user']);
			if ($data['user']['status']==TRUE) {
				redirect(base_url().'superadmin/landing');
			}
			else{
				redirect(base_url().'superadmin');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('login');
		$this->session->sess_destroy();
		redirect(base_url().'superadmin');
	}

	public function landing(){
		if (!$this->session->has_userdata('login')) {
			redirect(base_url().'superadmin');
		}
		$this->load->library('cart');
		if($this->input->server('REQUEST_METHOD')=='GET'){
				$time = $this->input->get('time');
				$id = $this->input->get('id');
				$date = $this->input->get('date');
				$location = $this->input->get('location');
				$name = $this->input->get('name');
			if (!empty($id) && !empty($time) && !empty($location) && !empty($name)) {
				$book = [];
				if ($this->session->has_userdata('booked')) {
					$book = $this->session->booked;
					$data['book'] = $book;
				}
				$array = [
					'id' => $id,
					'date' => $date,
					'time' => $time,
					'name' => $name,
					'location' =>$location
				];
				if (!in_array($array, $book)) {

					array_push($book,$array);
				}
				$data['book'] = $book;
				$this->session->set_userdata('booked',$data['book']);
				// $this->session->sess_destroy();
			}
			if(empty($date)){
				$this->rest->format('application/json');
				$result = $this->rest->get('transaction/available?');
				$data['schedule'] = json_decode(json_encode($result), true);
			}else{
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
			}
			$this->load->view('header',$data);
			$this->load->view('schedule');
			$this->load->view('footer');
		}
	}

  function __encrip_password($password) {
        return md5($password);
    }


}
