<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_mutasi extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
            function getMutasiSum($select){
                $query=$this->db->query("
                    SELECT $select
                    FROM trs_mutasi
                    WHERE status=0
                    GROUP BY date
                    ORDER BY date ASC
                ");
                return $query->result();
            }
	
	}
?>