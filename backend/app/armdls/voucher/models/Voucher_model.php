<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_model extends CI_Model{

  public function read($id){
  	if($id===NULL){
  		$replace = "" ;
  	}
  	else{
  		$replace = "='".$id."'";
  	}
  	$query = $this->db->query("select * from voucher where v_id".$replace);
  	return $query->result_array();
  }

  public function insert($data){
    // $this->db->set('v_id', ''.uniqid().'', FALSE);
  	$this->db->insert('voucher', $data);
  	return TRUE;
  }

  public function update($data){
  	$id= $data['l_id'];
  	$this->db->where('l_id',$id);
  	$this->db->update('voucher',$data);
  }

  public function delete($id){
    $query = $this->db->query("delete from voucher where v_id='".$id."'");
  	$query = $this->db->affected_rows();
  	if ($query >= 1) {
  		return TRUE;
  	}
  	else{
  		return FALSE;
  	}
  }

}
