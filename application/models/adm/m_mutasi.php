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
            function getMutasiHarian(){
                $query = $this->db->query("
                    SELECT E.*,IFNULL(jumlahTotalIn,0)- IFNULL(jumlahTotalOut,0) AS selisih 
                    FROM(
                            SELECT C.date,C.jumlahTotalIn,D.jumlahTotalOut
                            FROM(
                                    SELECT A.date,B.jumlahTotalIn
                                    FROM
                                    (
                                            SELECT date
                                            FROM trs_mutasi
                                            WHERE status=0
                                            GROUP BY date
                                    ) A
                                    LEFT JOIN
                                    (
                                            SELECT type,date,sum(amount) as jumlahTotalIn
                                            FROM trs_mutasi
                                            WHERE status=0
                                                    AND type='in'
                                            GROUP BY date,type
                                    ) B
                                    ON A.date = B.date
                            ) C
                            LEFT JOIN(
                                    SELECT type,date,sum(amount) as jumlahTotalOut
                                    FROM trs_mutasi
                                    WHERE status=0
                                            AND type='out'
                                    GROUP BY date,type
                            ) D
                            ON C.date = D.date
                    ) E
                    GROUP BY date
                    ORDER BY date DESC
                ");
                return $query->result();
            }
            
            function getUtangHarian(){
                $query = $this->db->query("
                    SELECT E.*,IFNULL(jumlahTotalIn,0)
                    FROM(
                            SELECT C.date,C.jumlahTotalIn
                            FROM(
                                    SELECT A.date,B.jumlahTotalIn
                                    FROM
                                    (
                                            SELECT date
                                            FROM trs_utangku
                                            WHERE status=0
                                            GROUP BY date
                                    ) A
                                    LEFT JOIN
                                    (
                                            SELECT debitur,date,sum(amount) as jumlahTotalIn
                                            FROM trs_utangku
                                            WHERE status=0
                                            GROUP BY date,debitur
                                    ) B
                                    ON A.date = B.date
                            ) C
                    ) E
                    GROUP BY date
                    ORDER BY date DESC
                ");
                return $query->result();
            }
	}
?>