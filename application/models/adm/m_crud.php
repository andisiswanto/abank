<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_crud extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
               
        	
		function allInsertSave($data,$getDbName){$this->db->insert($getDbName, $data);return;}
		
	
		function allValidate($data,$tableName,$columnName,$count){
			$this->db->select($count.' as jumlah');
			$this->db->from($tableName);
			$this->db->where($columnName,$data);
            $this->db->where('STATHAPUS','0');
			return $this->db->get()->result();
		}
		function allValidate2($data,$tableName,$columnName,$count,$data2,$columnParent){
			$this->db->select($count.'as jumlah');
			$this->db->from($tableName);
            $this->db->where('STATHAPUS','0');
			$this->db->where($columnName,$data);
			$this->db->where($columnParent,$data2);
            //echo $this->db; exit;
			return $this->db->get()->result();
		}
        function allValidate3($data,$tableName,$columnName,$count,$data2,$column2,$data3,$column3){
			$this->db->select($count.'as jumlah');
			$this->db->from($tableName);
            $this->db->where('STATHAPUS','0');
			$this->db->where($columnName,$data);
			$this->db->where($column2,$data2);
            $this->db->where($column3,$data3);
            //echo $this->db; exit;
			return $this->db->get()->result();
		}
		
		function get_allDetail($getId,$getTableName,$getprimColumnName){
			$this->db->select('*');
			$this->db->from($getTableName);
			$this->db->where($getprimColumnName,$getId);
			return $this->db->get()->result();
		}
		
		function allEditSave($data,$id,$getDbName,$getPrimColumnName){
			$this->db->where($getPrimColumnName,$id);  
			$this->db->update($getDbName,$data);	
		}
		
		function insertTrashAll($data,$table){$this->db->insert($table, $data); return;}
		function deleteAll($id,$table,$primColumn){
			$this->db->where($primColumn,$id);  
			$this->db->delete($table);	
		}
	   
       		
	
	}
?>