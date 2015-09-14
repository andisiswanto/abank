<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_user extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
        function cek_user_login($username,$password){
			$this->db->select('u.*');
			$this->db->from('mst_user u');
			//$this->db->where('a.usrid = u.usrid');
			$this->db->where('u.usrname',$username);
			$this->db->where('u.usrpass',$password);
			//$this->db->where('r.permissions = u.permissions');
			$query = $this->db->get();
		
			if($query->num_rows()==1){ //jika data=1
				return $query->row_array(); //return data dan nilai true
			}
			else{
				return FALSE; //else mengembalikan FALSE
			}
		}
		function cekUserStat($username){
			$query=$this->db->query("
				SELECT a.*
				FROM mst_user a
				WHERE a.usrname='$username'
			");
			return $query->result(); 
			
		}
	}
?>