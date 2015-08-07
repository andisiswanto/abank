<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_list extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
               
            function getListTabel($tabel,$order,$ascdesc){
                $query=$this->db->query("
                    SELECT *
                    FROM $tabel
                    WHERE status=0
                    ORDER BY $order $ascdesc
                ");
                return $query->result();
            }
            function getListTabelFromParent($tabel,$column,$value,$order,$ascdesc){
                $query=$this->db->query("
                    SELECT *
                    FROM $tabel
                    WHERE status=0
                        AND $column=$value
                    ORDER BY $order $ascdesc
                ");
                return $query->result();
            }
	
	}
?>