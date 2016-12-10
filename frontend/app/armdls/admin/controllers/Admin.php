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
		if ($this->session->has_userdata('login')) {
			redirect(base_url().'admin/landing');
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
				redirect(base_url().'admin/landing');
			}
			else{
				redirect(base_url().'admin');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}

	public function paymentlist(){
		$data =[];
		$data['invoice'] = $this->rest->get('transaction/invoice');
		$data['invoice'] = json_decode(json_encode($data['invoice']), true);
		// echo json_encode($data['invoice']);
		$this->load->view('header',$data);
		$this->load->view('paymentlist');
		$this->load->view('footer');
	}

	function sendEmail(){
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'rysmawidjaja@gmail.com';
        $config['smtp_pass']    = 'rysmaadityawidjaja19602';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('rysmawidjaja@gmail.com', 'Rysma Aditya W');
        $this->email->to('yeyrama@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Tes ram');

        $this->email->send();

        echo $this->email->print_debugger();
    }

	public function landing(){
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

	public function invoice($id=NULL)
	{
		if($this->input->server('REQUEST_METHOD')=='GET'){
			$i_id = $this->input->get('id');
			if (!empty($i_id)) {
				$invoice = $this->rest->get('transaction/invoice?filter[i_id]='.$i_id);
				$transactions = $this->rest->get('transaction/data?input[t_invoice]='.$i_id);
				$data['transactions'] = json_decode(json_encode($transactions), true);
				$data['invoice'] = json_decode(json_encode($invoice[0]), true);
				// echo json_encode($transactions);
				$this->load->view('header',$data);
				$this->load->view('invoice');
				$this->load->view('footer');
			}
			else{
				redirect(base_url().'admin/paymentlist');
			}

		}
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$data = $this->input->post(NULL,TRUE);
			if (!empty($id)) {
				$invoice = $this->rest->put('transaction/invoice/'.$id,$data,'');
				redirect(base_url().'admin/invoice?id='.$id);
			}
			else{
				redirect(base_url().'admin/paymentlist');
			}

		}

	}

	public function checkout()
	{
		$data['booked'] = $this->session->userdata('booked');
		$data['total_biaya'] = 0;
		for($i=0;$i < count($data['booked']);$i++) {
			$price = $this->rest->get('transaction/price?date='.$data['booked'][$i]['date']);
			$price = json_decode(json_encode($price), true);
			$data['booked'][$i]['price'] = $price['p_price'];
			$data['total_biaya'] = $data['total_biaya'] + $price['p_price'];
			// array_push($key,['price'=> $price['p_price']]);
		}
		// echo json_encode($data);
		$this->load->view('header',$data);
		$this->load->view('checkout');
		$this->load->view('footer');
	}
	public function confirm_payment(){
		if($this->input->server('REQUEST_METHOD')=='POST'){
			$invoice = $this->input->post('invoice');
			$sess_booked = $this->session->userdata('booked');
			$booked = [];
			$invoice['i_total_payment'] = 0;
			for($i=0;$i < count($sess_booked);$i++) {
				$price = $this->rest->get('transaction/price?date='.$sess_booked[$i]['date']);
				$price = json_decode(json_encode($price), true);
				// $data['booked'][$i]['price'] = $price['p_price'];
				$invoice['i_total_payment'] = $invoice['i_total_payment'] + $price['p_price'];
				// array_push($key,['price'=> $price['p_price']]);
				$booked[$i]['t_field'] = $sess_booked[$i]['id'];
				$booked[$i]['t_date'] = $sess_booked[$i]['date'];
				$booked[$i]['t_start_booking'] = $sess_booked[$i]['time'];
				$booked[$i]['t_end_booking'] = gmdate("H:i", ($sess_booked[$i]['time']+1)*3600);

			}
			$params = [
				'invoice' => $invoice,
				'transaction' => $booked
			];
			$result = $this->rest->post('transaction/payment', $params,'');
			$this->session->sess_destroy('booked');
			echo json_encode($result);

		}
	}


  function __encrip_password($password) {
        return md5($password);
    }


}
