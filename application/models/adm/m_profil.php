<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class M_profil extends CI_Model{
		function __construct(){
			//session_start();
			parent::__construct();
		}
               
        function getIdSisipan(){
            $query=$this->db->query("
				SELECT KODE_KLASIFIKASI
                FROM CLS_KLASIFIKASI
                WHERE STATHAPUS=0
                ORDER BY KODE_KLASIFIKASI ASC
			");
            $hasil=$query->result();
            
            //var_dump($hasil); exit;
            $data='';
            foreach($hasil as $a){
                $data=$data."[".$a->KODE_KLASIFIKASI."]"; //tambahkan bracket [1][2][3] 
            }
            
            for($i=1;$i<10;$i++){ //bisa disesuaikan sebanyak datanya
                $pembanding="[".$i."]";
                //echo $pembanding;
                $nilai=stristr($data,$pembanding); //apakah ada nilai string pembanding di string data, jika ada tampilkan nilai string pembanding sampai belakang
                //echo "/".$nilai;
                if($nilai==""){
                    $dataArray[]=$i;
                }
                //echo "->";
            }
            //var_dump($dataArray);
            //echo $dataArray[0];
            return $dataArray[0];
        }
        function get_katFromKlas($id){
            $query=$this->db->query("
				SELECT *
                FROM CLS_KATEGORI
                WHERE STATHAPUS=0
                    AND KODE_KLASIFIKASI='$id'
                ORDER BY NAMA_KATEGORI ASC
			");
			return $query->result();
        }
        function get_subFromKat($kode_klasifikasi,$kode_kategori){
            $query=$this->db->query("
				SELECT *
                FROM CLS_SUBKATEGORI
                WHERE STATHAPUS=0
                    AND KODE_KLASIFIKASI='$kode_klasifikasi'
                    AND KODE_KATEGORI='$kode_kategori'
                ORDER BY NAMA_SUBKATEGORI ASC
			");
			return $query->result();
        }
        function getKlasifikasi(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_KLASIFIKASI
                WHERE STATHAPUS=0
                ORDER BY KODE_KLASIFIKASI ASC
			");
			return $query->result();
        }
        function getSubkategori(){ //KARENA ADA EFEK STATHAPUS, MAKA TIDAK BISA MENGGUNAKAN LEFT JOIN BIASA
            $query=$this->db->query("
				SELECT * 
                FROM(
                		SELECT * 
                                FROM(
                                	SELECT *
                                	FROM CLS_SUBKATEGORI
                                	WHERE STATHAPUS=0
                                ) A
                                LEFT JOIN(
                			         SELECT KODE_KATEGORI AS KD_KAT,KODE_KLASIFIKASI AS KODE_KLAS,NAMA_KATEGORI
                			         FROM CLS_KATEGORI
                			         WHERE STATHAPUS=0
                                ) B
                                ON A.KODE_KATEGORI=B.KD_KAT 
					AND A.KODE_KLASIFIKASI=B.KODE_KLAS
                ) C
                LEFT JOIN(
                	SELECT KODE_KLASIFIKASI,NAMA_KLASIFIKASI
                        FROM CLS_KLASIFIKASI 
                        WHERE STATHAPUS=0	
                ) D
                ON C.KODE_KLASIFIKASI=D.KODE_KLASIFIKASI           
                ORDER BY c.KODE_KLASIFIKASI, c.KODE_KATEGORI, c.KODE_SUBKATEGORI ASC
			");
			return $query->result();
        }
        function getSubkategoriS($kode_klasifikasi){ //KARENA ADA EFEK STATHAPUS, MAKA TIDAK BISA MENGGUNAKAN LEFT JOIN BIASA
            $query=$this->db->query("
				SELECT * 
                FROM(
                		SELECT * 
                                FROM(
                                	SELECT *
                                	FROM CLS_SUBKATEGORI
                                	WHERE STATHAPUS=0
                                ) A
                                LEFT JOIN(
                			SELECT KODE_KATEGORI AS KD_KAT,KODE_KLASIFIKASI AS KODE_KLAS, NAMA_KATEGORI
                			FROM CLS_KATEGORI
                			WHERE STATHAPUS=0
                                ) B
                                ON A.KODE_KATEGORI=B.KD_KAT
					AND A.KODE_KLASIFIKASI=B.KODE_KLAS
                ) C
                LEFT JOIN(
                	SELECT KODE_KLASIFIKASI,NAMA_KLASIFIKASI
                        FROM CLS_KLASIFIKASI 
                        WHERE STATHAPUS=0	
                ) D
                ON C.KODE_KLASIFIKASI=D.KODE_KLASIFIKASI  
                WHERE c.KODE_KLASIFIKASI='$kode_klasifikasi'           
                ORDER BY c.KODE_KLASIFIKASI, c.NAMA_SUBKATEGORI ASC
			");
			return $query->result();
        }
        function getSubKategoriSimple(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_SUBKATEGORI
                WHERE STATHAPUS=0
			");
			return $query->result();
        }
        function getKategoriSimple(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_KATEGORI
                WHERE STATHAPUS=0
			");
			return $query->result();
        }
        function getMerk(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_MERK
                WHERE STATHAPUS=0
                ORDER BY NAMA_MERK ASC
			");
			return $query->result();
        }
        function getJenis(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_JENIS
                WHERE STATHAPUS=0
                ORDER BY NAMA_JENIS ASC
			");
			return $query->result();
        }
        function getKategori(){
            $query=$this->db->query("
				SELECT * 
                FROM(
                	SELECT *
        			FROM CLS_KATEGORI
 			        WHERE STATHAPUS=0
                ) C
                LEFT JOIN(
                    SELECT KODE_KLASIFIKASI,NAMA_KLASIFIKASI
                    FROM CLS_KLASIFIKASI
                    WHERE STATHAPUS=0
                ) D
                ON c.KODE_KLASIFIKASI=d.KODE_KLASIFIKASI     
                ORDER BY c.KODE_KLASIFIKASI,c.KODE_KATEGORI ASC
			");
			return $query->result();
        }
        function getKategoriS($kode_klasifikasi){
            $query=$this->db->query("
				SELECT *
                FROM CLS_KATEGORI
                WHERE STATHAPUS=0
                    AND KODE_KLASIFIKASI='$kode_klasifikasi'
                ORDER BY NAMA_KATEGORI ASC
			");
			return $query->result();
        }
        function getSatuan(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_SATUAN
                WHERE STATHAPUS=0
                ORDER BY KODE_SATUAN ASC
			");
			return $query->result();
        }
        function getClient(){
            $query=$this->db->query("
				SELECT *
                FROM MST_CLIENT
                WHERE STATHAPUS=0
                ORDER BY NAMA_CLIENT ASC
			");
			return $query->result();
        }
        function getPekerjaan(){
            $query=$this->db->query("
				SELECT *
                FROM MST_PEKERJAAN
                WHERE STATHAPUS=0
                ORDER BY NAMA_PEKERJAAN ASC
			");
			return $query->result();
        }
        
        
                
        function getMaterial(){
            $query=$this->db->query("
				SELECT * 
                FROM(
                		SELECT * 
                                FROM(
                                	SELECT z.*,y.NAMA_SATUAN
                                	FROM MST_MATERIAL z
                                    LEFT JOIN CLS_SATUAN Y
                                        ON z.ID_SATUAN=y.ID_SATUAN
                                	WHERE z.STATHAPUS=0
                                ) A
                                LEFT JOIN(
                			SELECT KODE_KLASIFIKASIGROUP AS KD_KLASGROUP,NAMA_SUBKATEGORI
                			FROM CLS_SUBKATEGORI
                			WHERE STATHAPUS=0
                                ) B
                                ON A.KODE_KLASIFIKASIGROUP=B.KD_KLASGROUP
                ) C
                LEFT JOIN(
                	SELECT KODE_KATEGORI AS KODE_KAT,NAMA_KATEGORI,KODE_KLASIFIKASI AS KODE_KLAS
                        FROM CLS_KATEGORI
                        WHERE STATHAPUS=0	
                ) D
                ON C.KODE_KATEGORI=D.KODE_KAT  
			AND C.KODE_KLASIFIKASI=D.KODE_KLAS
                WHERE c.KODE_KLASIFIKASI='2'           
                ORDER BY c.KODE_KLASIFIKASIGROUP, c.NAMA_MATERIAL ASC
			");
			return $query->result();
        }
        function getPeople(){
            $query=$this->db->query("
				SELECT * 
                FROM(
                		SELECT * 
                                FROM(
                                	SELECT z.*,y.NAMA_SATUAN
                                	FROM MST_MATERIAL z
                                    LEFT JOIN CLS_SATUAN Y
                                        ON z.ID_SATUAN=y.ID_SATUAN
                                	WHERE z.STATHAPUS=0
                                ) A
                                LEFT JOIN(
                			SELECT KODE_KLASIFIKASIGROUP AS KD_KLASGROUP,NAMA_SUBKATEGORI
                			FROM CLS_SUBKATEGORI
                			WHERE STATHAPUS=0
                                ) B
                                ON A.KODE_KLASIFIKASIGROUP=B.KD_KLASGROUP
                ) C
                LEFT JOIN(
                	SELECT KODE_KATEGORI AS KODE_KAT,NAMA_KATEGORI,KODE_KLASIFIKASI AS KODE_KLAS
                        FROM CLS_KATEGORI
                        WHERE STATHAPUS=0	
                ) D
                ON C.KODE_KATEGORI=D.KODE_KAT  
			AND C.KODE_KLASIFIKASI=D.KODE_KLAS
                WHERE c.KODE_KLASIFIKASI='1'           
                ORDER BY c.KODE_KLASIFIKASIGROUP, c.NAMA_MATERIAL ASC
			");
			return $query->result();
        }
        function getPacking(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_PACKING
                WHERE STATHAPUS=0
                ORDER BY NAMA_PACKING ASC
			");
			return $query->result();
        }
        function getBesaran(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_BESARAN
                WHERE STATHAPUS=0
                ORDER BY NAMA_BESARAN ASC
			");
			return $query->result();
        }
        /*function getUkuran(){
            $query=$this->db->query("
				SELECT *
                FROM CLS_UKURAN
                WHERE STATHAPUS=0
                ORDER BY NAMA_UKURAN ASC
			");
			return $query->result();
        }*/
		//===================================================INSERT SAVE====================================================
		
		function allInsertSave($data,$getDbName){$this->db->insert($getDbName, $data);return;}
		
		
        function get_idLast($getDbName,$getPrimColumnName){ 
			$this->db->select($getPrimColumnName);
			$this->db->from($getDbName);
			$this->db->order_by($getPrimColumnName, 'desc');
			$this->db->limit(1);
			return $this->db->get()->result();
		}
		function get_idAllLast($getDbName,$getPrimColumnName){ 
			$this->db->select($getPrimColumnName);
			$this->db->from($getDbName);
            $this->db->where('STATHAPUS','0');
			$this->db->order_by($getPrimColumnName, 'desc');
			$this->db->limit(1);
			return $this->db->get()->result();
		}
		
		function get_idAllLast2($getDbName,$getPrimColumnName,$getConditionColumnName,$getConditionContentName){ 
			$this->db->select($getPrimColumnName);
			$this->db->from($getDbName);
            $this->db->where('STATHAPUS','0');
			$this->db->where($getConditionColumnName,$getConditionContentName);
			$this->db->order_by($getPrimColumnName, 'desc');
			$this->db->limit(1);
			return $this->db->get()->result();
		}
        function get_idAllLast3($getDbName,$getPrimColumnName,$getConditionColumnName,$getConditionContentName,$kolom2,$value2){ 
			$this->db->select($getPrimColumnName);
			$this->db->from($getDbName);
            $this->db->where('STATHAPUS','0');
			$this->db->where($getConditionColumnName,$getConditionContentName);
            $this->db->where($kolom2,$value2);
			$this->db->order_by($getPrimColumnName, 'desc');
			$this->db->limit(1);
			return $this->db->get()->result();
		}
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
		//====================================================GET DETAIL==========================================
		
		
		function get_allDetail($getId,$getTableName,$getprimColumnName){
			$this->db->select('*');
			$this->db->from($getTableName);
			$this->db->where($getprimColumnName,$getId);
			return $this->db->get()->result();
		}
		
		//==================================================END GET DETAIL========================================
		//========================================================EDIT SAVE=======================================
		
		
		function allEditSave($data,$id,$getDbName,$getPrimColumnName){
			$this->db->where($getPrimColumnName,$id);  
			$this->db->update($getDbName,$data);	
		}
		
		//===================================================END EDIT SAVE========================================
		
		
		//=================================================================FUNCTION BEFORE siapa tau berguna
		//dapatkan data user yang login saat itu
		
		function insertTrashAll($data,$table){$this->db->insert($table, $data); return;}
		//=====================================================DELETE========================================================
		function deleteAll($id,$table,$primColumn){
			$this->db->where($primColumn,$id);  
			$this->db->delete($table);	
		}
	   
       
       
	//~~ Created by Surya Alam Gultom
	//~~ Begin Cls Ukuran
		function insert_ukuran($arr){
			$kode_ukuran = $arr['kode_ukuran'];			
			$nama_ukuran = $arr['nama_ukuran'];
			$keterangan  = $arr['keterangan'];										
			$sql = " 
				INSERT INTO cls_ukuran ( 
					kode_ukuran, nama_ukuran, keterangan, userinput, tglinput, stathapus   
				) values ( 
					'$kode_ukuran','$nama_ukuran','$keterangan','Surya',now(),'0'  
				) 
			";			
			$this->db->query($sql);
		}
		function delete_ukuran($arr){
			$id_ukuran = $arr['id_ukuran'];					
			if (!empty($id_ukuran)) {
				$sql = " 
					UPDATE cls_ukuran set  
						stathapus = '1'    
					WHERE 
						id_ukuran = '$id_ukuran' 					 
				";
			}			
			$this->db->query($sql);
		}
		function update_ukuran($arr){
			$id_ukuran   = $arr['id_ukuran'];
			$nama_ukuran = $arr['nama_ukuran'];
			$keterangan  = $arr['keterangan'];	
			if (!empty($id_ukuran)) {
				$sql = " 
					UPDATE cls_ukuran set  						
						nama_ukuran = '$nama_ukuran', 
						keterangan  = '$keterangan', 
						userupdate  = 'Surya', 
						tglupdate   = now(), 
						stathapus	= '0' 
					WHERE 
						id_ukuran = '$id_ukuran' 					
				";	
				//var_dump($sql); exit;
				$this->db->query($sql);
			}
		}
		/*
		function count_ukuran($arr) {
			$whereCond = "";
			if (!empty($arr)) {
				if (!empty($arr['search_by_ukuran'])) {
					$whereCond .= " and upper(nama_ukuran) like upper('%" . $arr['search_by_ukuran'] . "%')";
				}
			}
			$sql = "
				select COUNT(*) cnt FROM cls_ukuran 
				WHERE (stathapus is NULL or stathapus = '0') $whereCond 
				ORDER BY id_ukuran DESC
			";								  									 
			$result = $this->db->query($sql)->row();
			return $result->cnt;
		}
		*/
		
        function getUkuran(){
			$whereCond = "";
			// if (!empty($arr)) {
				// if (!empty($arr['search_by_ukuran'])) {
					// $whereCond .= " and upper(nama_ukuran) like upper('%" . $arr['search_by_ukuran'] . "%')";
				// }
			// }
			$query = $this->db->query(" 
				SELECT * FROM cls_ukuran 
				WHERE (stathapus is NULL or stathapus = '0') $whereCond 
				ORDER BY id_ukuran DESC 
			"); 
			return $query->result();
		}
		/*
		function search_ukuran($arr, $limit = NULL) {
			$whereCond = "";
			if (!empty($arr)) {
				if (!empty($arr['search_by_ukuran'])) {
					$whereCond .= " and upper(nama_ukuran) like upper('%" . $arr['search_by_ukuran'] . "%')";
				}
			}
			$sql = "
				SELECT * FROM cls_ukuran 
				WHERE (stathapus is NULL or stathapus = '0') $whereCond $limit 
				ORDER BY id_ukuran DESC   		
			"; 
			//var_dump("$sql"); exit;
			$query = $this->db->query($sql);
			return $query->result();			
		}
		*/
		function reset_ukuran(){
			$sql = " 
				TRUNCATE Table cls_ukuran  					 
			";			
			$this->db->query($sql);
		}
    //~~ End Cls Ukuran	
	//~~ Begin Mst Company
		function getCompany(){
			$query = $this->db->query(" 
				SELECT * FROM mst_company 
				WHERE (stathapus is NULL or stathapus = '0') 
				ORDER BY id_com DESC 
			"); 
			return $query->result();
		}
		function insert_company($arr){
			$nama_com 	= $arr['nama_com'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$visi		= $arr['visi'];
			$misi		= $arr['misi'];
			$profile	= $arr['profile'];
			$about		= $arr['about'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$keterangan = $arr['keterangan'];	
			
			$sql = " 
				INSERT INTO mst_company ( 
					nama_com, alamat, kota, no_telp, no_fax, 
					visi, misi, profile, about, 
					website, nama_pic, no_hp_pic, email_pic, 
					keterangan, userinput, tglinput, stathapus   
				) values ( 
					'$nama_com','$alamat','$kota','$no_telp','$no_fax',
					'$visi', '$misi', '$profile', '$about', 
					'$website','$nama_pic','$no_hp_pic','$email_pic',
					'$keterangan','Surya',now(),'0'  
				) 
			";			
			$this->db->query($sql);
		}
		function delete_company($arr){
			$id_com = $arr['id_com'];					
			if (!empty($id_com)) {
				$sql = " 
					UPDATE mst_company set  
						stathapus = '1'    
					WHERE 
						id_com = '$id_com' 					 
				";
			}			
			$this->db->query($sql);
		}
		function update_company($arr){
			$id_com   = $arr['id_com'];
			$nama_com 	= $arr['nama_com'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$visi		= $arr['visi'];
			$misi		= $arr['misi'];
			$profile	= $arr['profile'];
			$about		= $arr['about'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$keterangan = $arr['keterangan'];	
			
			if (!empty($id_com)) {
				$sql = " 
					UPDATE mst_company set  						
						nama_com 	= '$nama_com', 
						alamat 		= '$alamat',
						kota 		= '$kota',
						no_telp 	= '$no_telp',
						no_fax 		= '$no_fax',
						visi		= '$visi', 
						misi		= '$misi', 
						profile		= '$profile', 
						about		= '$about', 
						website		= '$website',
						nama_pic	= '$nama_pic',
						no_hp_pic	= '$no_hp_pic',
						email_pic	= '$email_pic',
						keterangan  = '$keterangan', 
						userupdate  = 'Surya', 
						tglupdate   = now(), 
						stathapus	= '0' 
					WHERE 
						id_com = '$id_com' 					
				";	
				$this->db->query($sql);
			}
		}
	//~~ End Mst Company
	//~~ Begin Mst Supplier
		function getSupplier(){
			$query = $this->db->query(" 
				SELECT * FROM mst_supplier 
				WHERE (stathapus is NULL or stathapus = '0') 
				ORDER BY id_spl DESC 
			"); 
			return $query->result();
		}
		function insert_supplier($arr){
			$nama_spl 	= $arr['nama_spl'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$keterangan = $arr['keterangan'];	
			
			$sql = " 
				INSERT INTO mst_supplier ( 
					nama_spl, alamat, kota, no_telp, no_fax,
					website, nama_pic, no_hp_pic, email_pic, 
					keterangan, userinput, tglinput, stathapus   
				) values ( 
					'$nama_spl','$alamat','$kota','$no_telp','$no_fax',
					'$website','$nama_pic','$no_hp_pic','$email_pic',
					'$keterangan','Surya',now(),'0'  
				) 
			";			
			$this->db->query($sql);
		}
		function delete_supplier($arr){
			$id_spl = $arr['id_spl'];					
			if (!empty($id_spl)) {
				$sql = " 
					UPDATE mst_supplier set  
						stathapus = '1'    
					WHERE 
						id_spl = '$id_spl' 					 
				";
			}			
			$this->db->query($sql);
		}
		function update_supplier($arr){
			$id_spl   = $arr['id_spl'];
			$nama_spl 	= $arr['nama_spl'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$keterangan = $arr['keterangan'];	
			
			if (!empty($id_spl)) {
				$sql = " 
					UPDATE mst_supplier set  						
						nama_spl 	= '$nama_spl', 
						alamat 		= '$alamat',
						kota 		= '$kota',
						no_telp 	= '$no_telp',
						no_fax 		= '$no_fax',
						website		= '$website',
						nama_pic	= '$nama_pic',
						no_hp_pic	= '$no_hp_pic',
						email_pic	= '$email_pic',
						keterangan  = '$keterangan', 
						userupdate  = 'Surya', 
						tglupdate   = now(), 
						stathapus	= '0' 
					WHERE 
						id_spl = '$id_spl' 					
				";	
				$this->db->query($sql);
			}
		}
    //~~ End Mst Supplier
	//~~ Begin Mst Ekspedisi
		function getEkspedisi(){
			$query = $this->db->query(" 
				SELECT * FROM mst_ekspedisi 
				WHERE (stathapus is NULL or stathapus = '0') 
				ORDER BY id_eks DESC 
			"); 
			return $query->result();
		}
		function insert_ekspedisi($arr){
			$nama_eks 	= $arr['nama_eks'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$spesialisasi = $arr['spesialisasi'];	
			$deskripsi 	= $arr['deskripsi'];
			
			$sql = " 
				INSERT INTO mst_ekspedisi ( 
					nama_eks, alamat, kota, no_telp, no_fax,
					website, nama_pic, no_hp_pic, email_pic, 
					spesialisasi, deskripsi, userinput, tglinput, stathapus   
				) values ( 
					'$nama_eks','$alamat','$kota','$no_telp','$no_fax',
					'$website','$nama_pic','$no_hp_pic','$email_pic',
					'$spesialisasi','$deskripsi','Surya',now(),'0'  
				) 
			";			
			$this->db->query($sql);
		}
		function delete_ekspedisi($arr){
			$id_eks = $arr['id_eks'];					
			if (!empty($id_eks)) {
				$sql = " 
					UPDATE mst_ekspedisi set  
						stathapus = '1'    
					WHERE 
						id_eks = '$id_eks' 					 
				";
			}			
			$this->db->query($sql);
		}
		function update_ekspedisi($arr){
			$id_eks   = $arr['id_eks'];
			$nama_eks 	= $arr['nama_eks'];
			$alamat 	= $arr['alamat'];
			$kota		= $arr['kota'];
			$no_telp	= $arr['no_telp'];
			$no_fax		= $arr['no_fax'];
			$website	= $arr['website'];
			$nama_pic	= $arr['nama_pic'];
			$no_hp_pic	= $arr['no_hp_pic'];
			$email_pic	= $arr['email_pic'];
			$spesialisasi = $arr['spesialisasi'];	
			$deskripsi 	= $arr['deskripsi'];	
			
			if (!empty($id_eks)) {
				$sql = " 
					UPDATE mst_ekspedisi set  						
						nama_eks 	= '$nama_eks', 
						alamat 		= '$alamat',
						kota 		= '$kota',
						no_telp 	= '$no_telp',
						no_fax 		= '$no_fax',
						website		= '$website',
						nama_pic	= '$nama_pic',
						no_hp_pic	= '$no_hp_pic',
						email_pic	= '$email_pic',
						spesialisasi = '$spesialisasi', 
						deskripsi 	= '$deskripsi', 
						userupdate  = 'Surya', 
						tglupdate   = now(), 
						stathapus	= '0' 
					WHERE 
						id_eks = '$id_eks' 					
				";	
				$this->db->query($sql);
			}
		}
    //~~ End Mst Ekspedisi	
	//~~ End by Surya Alam Gultom		
	
	}
?>