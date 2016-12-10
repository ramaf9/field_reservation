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
					if ($this->session->has_userdata('login')) {
						$data= $this->session->userdata('login');
						$role = $data['data']['role'];
						if (isset($role) && $role=="adm") {

						}
						else if (isset($role) && $role=="s_adm"){
							redirect(base_url().'superadmin/landing');
						}
						else{
							echo json_encode($data);
							// redirect(base_url().'home/landing');
						}

					}
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
			// echo json_encode($data['user']);
			if ($data['user']['status']==TRUE) {
				$this->session->set_userdata('login',$data['user']);
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
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('rysmawidjaja@gmail.com', 'Rysma Aditya W');
        $this->email->to('rysmawidjaja@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('
				<link href="http://scholarplus.co/assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://scholarplus.co/assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="http://scholarplus.co/assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="http://scholarplus.co/assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="http://scholarplus.co/assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="http://scholarplus.co/assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />
				<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-right"><img src="assets/images/logo_dark.png" alt="velonic"></h4>

                            </div>
                            <div class="pull-right">
                                <h4>Invoice # <br>
                                    <strong>2015-04-23654789</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="pull-left m-t-30">
                                    <address>
                                      <strong>Twitter, Inc.</strong><br>
                                      795 Folsom Ave, Suite 600<br>
                                      San Francisco, CA 94107<br>
                                      <abbr title="Phone">P:</abbr> (123) 456-7890
                                      </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> Jun 15, 2015</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                            <tr><th>#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>LCD</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>1</td>
                                                <td>$380</td>
                                                <td>$380</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Mobile</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>5</td>
                                                <td>$50</td>
                                                <td>$250</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>LED</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>2</td>
                                                <td>$500</td>
                                                <td>$1000</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>LCD</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>3</td>
                                                <td>$300</td>
                                                <td>$900</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Mobile</td>
                                                <td>Lorem ipsum dolor sit amet.</td>
                                                <td>5</td>
                                                <td>$80</td>
                                                <td>$400</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                                <p class="text-right">Discout: 12.9%</p>
                                <p class="text-right">VAT: 12.9%</p>
                                <hr>
                                <h3 class="text-right">USD 2930.00</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>');

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
			$extend = $this->input->get('extend');
			$action = $this->input->get('action');
			if (!empty($action) && $action == "removeExtend") {
				$this->session->unset_userdata('invoice_'.$i_id.'');

			}


			if (!empty($i_id)) {
				$invoice = $this->rest->get('transaction/invoice?filter[i_id]='.$i_id);
				$transactions = $this->rest->get('transaction/data?input[t_invoice]='.$i_id);
				$lease = $this->rest->get('lease/data/'.$i_id);
				$data['transactions'] = json_decode(json_encode($transactions), true);
				$lease = json_decode(json_encode($lease), true);
				$data['invoice'] = json_decode(json_encode($invoice[0]), true);
				$data['temp_payment'] = $data['invoice']['i_total_payment'];
				if (isset($lease['status']) && !$lease['status']) {

				}
				else{
					$this->session->set_userdata('invoice_'.$i_id.'',$lease);
				}
				// echo json_encode($lease);

				if ($this->session->has_userdata('invoice_'.$i_id.'') && $data['invoice']['i_status']=="paid") {
					$data['extend'] = $this->session->userdata('invoice_'.$i_id.'');
					// echo json_encode($data['extend']);
					if (!empty($extend)) {
						array_push($data['extend'],$extend);
						$this->session->set_userdata('invoice_'.$i_id.'',$data['extend']);
						// echo json_encode($data['extend']);
						// redirect(base_url().'admin/invoice?id='.$i_id);
					}

					foreach ($data['extend'] as $key ) {
						$data['temp_payment'] = $data['temp_payment'] + $key['l_price'];
					}


				}
				else{
					$this->session->set_userdata('invoice_'.$i_id.'',array());
				}

				// $data['lease'] = json_decode(json_encode($lease), true);
				// echo json_encode($this->session->userdata('invoice_'.$i_id));
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

				$invoice = $this->rest->get('transaction/invoice?filter[i_id]='.$id);
				$transactions = $this->rest->get('transaction/data?input[t_invoice]='.$id);
				$lease = $this->rest->get('lease/data');
				$data['transactions'] = json_decode(json_encode($transactions), true);
				$data['invoice'] = json_decode(json_encode($invoice[0]), true);
				$data['temp_payment'] = $data['invoice']['i_total_payment'];

				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'rysmawidjaja@gmail.com';
				$config['smtp_pass']    = 'rysmaadityawidjaja19602';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html';
				$config['validation'] = TRUE;
				$this->email->initialize($config);
				$this->email->from('rysmawidjaja@gmail.com', 'Rysma Aditya W');
				$this->email->to('rysmawidjaja@gmail.com');
				// $this->email->message('
				// <div class="row">
        //     <div class="col-md-12">
        //         <div class="panel panel-default">
        //             <!-- <div class="panel-heading">
        //                 <h4>Invoice</h4>
        //             </div> -->
        //             <div class="panel-body">
        //                 <div class="clearfix">
        //                     <div class="pull-left">
        //                         <h4 class="text-right"><img src="assets/images/logo_dark.png" alt="velonic"></h4>
				//
        //                     </div>
        //                     <div class="pull-right">
        //                         <h4>Invoice # <br>
        //                             <strong>'.$data['invoice']['i_id'].'</strong>
        //                         </h4>
        //                     </div>
        //                 </div>
        //                 <hr>
        //                 <div class="row">
        //                     <div class="col-md-12">
        //                         <div class="pull-left m-t-30">
        //                             <address>
        //                               <strong>'.$data['invoice']['i_nama_pemesan'].'</strong><br>
        //                               '.$data['invoice']['i_email_pemesan'].'<br>
        //                               <abbr title="Phone">P:</abbr>'.$data['invoice']['i_email_pemesan'].'
        //                               </address>
        //                         </div>
        //                         <div class="pull-right m-t-30">
        //                             <p><strong>Order Date: </strong> Jun 15, 2015</p>
        //                             <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">'.$data['invoice']['i_status'].'</span></p>
        //                             <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <div class="m-h-50"></div>
        //                 <div class="row">
        //                     <div class="col-md-12">
        //                         <div class="table-responsive">
        //                             <table class="table m-t-30">
        //                                 <thead>
        //                                     <tr><th>#</th>
        //                                     <th>Item</th>
        //                                     <th>Description</th>
        //                                     <th>Quantity</th>
        //                                     <th>Unit Cost</th>
        //                                     <th>Total</th>
        //                                 </tr></thead>
        //                                 <tbody>
        //                                     <tr>
        //                                         <td>1</td>
        //                                         <td>LCD</td>
        //                                         <td>Lorem ipsum dolor sit amet.</td>
        //                                         <td>1</td>
        //                                         <td>$380</td>
        //                                         <td>$380</td>
        //                                     </tr>
        //                                     <tr>
        //                                         <td>2</td>
        //                                         <td>Mobile</td>
        //                                         <td>Lorem ipsum dolor sit amet.</td>
        //                                         <td>5</td>
        //                                         <td>$50</td>
        //                                         <td>$250</td>
        //                                     </tr>
        //                                     <tr>
        //                                         <td>3</td>
        //                                         <td>LED</td>
        //                                         <td>Lorem ipsum dolor sit amet.</td>
        //                                         <td>2</td>
        //                                         <td>$500</td>
        //                                         <td>$1000</td>
        //                                     </tr>
        //                                     <tr>
        //                                         <td>4</td>
        //                                         <td>LCD</td>
        //                                         <td>Lorem ipsum dolor sit amet.</td>
        //                                         <td>3</td>
        //                                         <td>$300</td>
        //                                         <td>$900</td>
        //                                     </tr>
        //                                     <tr>
        //                                         <td>5</td>
        //                                         <td>Mobile</td>
        //                                         <td>Lorem ipsum dolor sit amet.</td>
        //                                         <td>5</td>
        //                                         <td>$80</td>
        //                                         <td>$400</td>
        //                                     </tr>
        //                                 </tbody>
        //                             </table>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <div class="row" style="border-radius: 0px;">
        //                     <div class="col-md-3 col-md-offset-9">
        //                         <p class="text-right"><b>Sub-total:</b> 2930.00</p>
        //                         <p class="text-right">Discout: 12.9%</p>
        //                         <p class="text-right">VAT: 12.9%</p>
        //                         <hr>
        //                         <h3 class="text-right">USD 2930.00</h3>
        //                     </div>
        //                 </div>
        //                 <hr>
        //                 <div class="hidden-print">
        //                     <div class="pull-right">
        //                         <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
        //                         <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
				//
        //     </div>
				//
        // </div>
				// ');
				$this->email->message($this->load->view('invoice',$data,TRUE));
				$this->email->subject('Test');
				$this->email->send();

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
			// echo json_encode($result);

		}
	}


  function __encrip_password($password) {
        return md5($password);
    }


}
