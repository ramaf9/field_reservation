<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
  public function read($data){
  	if(!isset($data['t_id'])){
  		$id = "" ;
  	}
  	else{
  		$id = "='".$data['t_id']."'";
  	}

    if(!isset($data['t_date'])){
  		$date = "" ;
  	}
  	else{
  		$date = "='".$data['t_date']."'";
  	}

  	$query = $this->db->query("
                              select * from transaction
                               inner join price
                              on price.p_price = (transaction.t_price/transaction.t_time_length)
                               inner join field
                              on field.f_id = transaction.t_field
                              where t_id".$id.
                              " AND t_date".$date."
                              GROUP BY transaction.t_id
                              ORDER BY price.p_start_booking ASC" );
  	return $query->result_array();
  }

  public function read_field($id){
  	if($id===NULL){
  		$replace = "" ;
  	}
  	else{
  		$replace = "=$id";
  	}
  	$query = $this->db->query("select * from field where f_id".$replace);
  	return $query->result_array();
  }

  public function insert($data) {
    $this->db->insert('transaction',$data);
    return TRUE;
  }

  public function update($data){
  	$id= $data['t_id'];
  	$this->db->where('t_id',$id);
  	$this->db->update('transaction',$data);
  }

  public function delete($id){
    $query = $this->db->query("delete from transaction where t_id='".$id."'");
  	$query = $this->db->affected_rows();
  	if ($query >= 1) {
  		return TRUE;
  	}
  	else{
  		return FALSE;
  	}
  }

  public function check_time($data){
  	if($data===NULL){
  		$replace = "" ;
  	}
  	else{
  		$replace = "='".$data."'";
  	}
  	$query = $this->db->query("select * from transaction where month(t_date)".$replace);
  	if ($query->num_rows() > 0) {
  		return TRUE;
  	}
  	else{
  		return FALSE;
  	}
  }

  public function check_field($data){
  	if($data===NULL){
  		$replace = "" ;
  	}
  	else{
  		$replace = "='".$data."'";
  	}
  	$query = $this->db->query("select transaction.t_field, field.f_name from transaction inner join field
                               on transaction.t_field=field.f_name where t_field".$replace);
  	if ($query->num_rows() === 1) {
  		return TRUE;
  	}
  	else{
  		return FALSE;
  	}
  }

  public function check_data_payment ($data) {
  	$query = $this->db->query("select * from transaction where t_start_booking ='".$data['t_start_booking']."' AND t_date ='".$data['t_date']."'");
  	if ($query->num_rows() == 0) {
      return TRUE;
    }
  	else
    {
  		return FALSE;
  	}
  }

  public function check_payment ($data) {
  	$query = $this->db->query("select * from price where p_start_booking <= '".$data['t_start_booking']."' ORDER BY p_start_booking DESC LIMIT 1");
    $query = $query->result_array();
    $data['t_time_length'] = $data['t_end_booking'] - $data['t_start_booking'];
    $data['t_price'] = $query[0]['p_price'] * intval($data['t_time_length']);
    if (intval($data['t_current_payment'] <= $data['t_price']) && intval($data['t_current_payment'] >= 1/2* $query[0]['p_price']) ) {

      $data['t_status'] = "Belum bayar";
      return $this->insert($data);
    }
  	else
    {
  		return FALSE;
  	}
  }
  public function check_available_schedule($data){
    $query = $this->db->query("select transaction.t_field, field.f_name from transaction inner join field
                               on transaction.t_field=field.f_name where t_field=".$data['f_location']);
  }

}
