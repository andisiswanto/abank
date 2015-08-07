<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class m_validate extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
               
            function allValidate($count,$tableName,$column,$data){
			$this->db->select($count.'as jumlah');
			$this->db->from($tableName);
                        $this->db->where('status','0');
			$this->db->where($column,$data);
                        //echo $this->db; die;
                        $resultCount=$this->db->get()->result();
                        foreach ($resultCount as $rs){
                            $cnt=$rs->jumlah;
                        }
			return $cnt;
            }	    
            function allValidate2($count,$tableName,$column,$data,$column2,$data2){
			$this->db->select($count.'as jumlah');
			$this->db->from($tableName);
                        $this->db->where('status','0');
			$this->db->where($column,$data);
			$this->db->where($column2,$data2);
                        //echo $this->db; exit;
                        $resultCount=$this->db->get()->result();
                        foreach ($resultCount as $rs){
                            $cnt=$rs->jumlah;
                        }
			return $cnt;
            }		
	
	}
?>

