<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_report extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
            function getRepMutasiAsoka(){
                $query=$this->db->query("
                    SELECT id_asoka,type,amount,fromto,date,description
                    FROM trs_asoka
                    WHERE status=0
                    ORDER BY id_asoka ASC
                ");
                return $query->result();
            }
            function getRepMutasiAndi(){
                $query=$this->db->query("
                    SELECT id_mutasi,type,amount,date,description
                    FROM trs_mutasi
                    WHERE status=0
                    ORDER BY id_mutasi ASC
                ");
                return $query->result();
            }
            function getRepMutasiUtang(){
                $query=$this->db->query("
                    SELECT id_utang,debitur,amount,date,description,payment_status,payment_amount
                    FROM trs_utangku
                    WHERE status=0
                    ORDER BY id_utang ASC
                ");
                return $query->result();
            }
	}
?>