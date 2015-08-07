<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class M_aplikasi extends CI_Model{
	function __construct(){
            //session_start();
            parent::__construct();
	}
               
        function getTabelDef($tabel,$kolom,$nilai){
            $query=$this->db->query("
                SELECT *
                FROM $tabel
                WHERE status=0
                    AND $kolom='$nilai'
                ");
            return $query->result();
        }	
        
        function getRootData1($tabel,$kolom1,$nilai1,$order,$ascdesc){
            $query=$this->db->query("
		SELECT *
                FROM $tabel
                WHERE status=0
                    AND $kolom1='$nilai1'
                ORDER BY $order $ascdesc
            ");
            return $query->result();
        }
        function getRootData1_order2($tabel,$kolom1,$nilai1,$order,$order2,$ascdesc){
            $query=$this->db->query("
		SELECT *
                FROM $tabel
                WHERE status=0
                    AND $kolom1='$nilai1'
                ORDER BY $order,$order2 $ascdesc
            ");
            return $query->result();
        }
    }
?>