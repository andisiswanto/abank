<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_detail extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
               
        function getDetailTabel($tabel,$kolom,$nilai){
            $query=$this->db->query("
				SELECT *
                FROM $tabel
                WHERE status=0
                    AND $kolom='$nilai'
			");
			return $query->result();
        }		
	
	}
?>