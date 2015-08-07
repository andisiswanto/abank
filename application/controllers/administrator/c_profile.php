<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class C_profile extends CI_Controller{	
		function __construct(){
			session_start();
			parent::__construct();
            $this->load->model('adm/m_profil');
            $this->load->model('adm/m_list');
            $this->load->model('adm/m_detail');
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
        
		
        //SEJARAH=============================================================================================
		public function sejarah(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_sejarah','kode_sejarah','ASC');
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_sejarahlist',$data);
		}
        public function sejarahAdd(){
            $this->load->view('adm/v_header');
            $this->load->view('adm/list/v_sejarahAdd',$data);
		}
        public function sejarahDetail(){
            $kode=$_POST['kode'];
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_sejarah','kode_sejarah',$kode);
            $this->load->view('adm/detail/v_sejarahdetail',$data);
		}
        public function sejarahAddSave(){
            $judul_sejarah=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'judul_sejarah' => $judul_sejarah,
                'deskripsi' => $deskripsi,
                
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allInsertSave($data,'mst_sejarah');
            ?>
            <script>
                alert("Sejarah berhasil ditambahkan");
                top.location.href="<?php echo site_url('administrator/c_profile/sejarah');?>";
            </script>
            <?php
        }
        //SEJARAH END=============================================================================================
        //STRUKTUR=============================================================================================
		public function struktur(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_struktur','kode_struktur','ASC');
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_strukturlist',$data);
            //$this->load->view('adm/profile/v_struktur');
		}
        public function strukturDetail(){
            $kode=$_POST['kode'];
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_struktur','kode_struktur',$kode);
            $this->load->view('adm/detail/v_strukturdetail',$data);
		}
        public function strukturAddSave(){
            $judul_struktur=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'judul_struktur' => $judul_struktur,
                'deskripsi' => $deskripsi,
                
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allInsertSave($data,'mst_struktur');
            ?>
            <script>
                alert("Struktur Organisasi berhasil ditambahkan");
                top.location.href="<?php echo site_url('administrator/c_profile/struktur');?>";
            </script>
            <?php
        }
        //STRUKTUR END=============================================================================================
        //VISI=============================================================================================
		public function visi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_visi','kode_visi','ASC');
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_visilist',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function visiAdd(){
            $this->load->view('adm/profile/v_visiAdd');
        }
        public function visiEdit(){
            $kode=$_POST['kode'];
            $data['kode']=$kode;
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_visi','kode_visi',$kode);
            $this->load->view('adm/profile/v_visiEdit',$data);
        }
        public function visiDetail(){
            $kode=$_POST['kode'];
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_visi','kode_visi',$kode);
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/detail/v_visidetail',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function visiAddSave(){
            $judul_visi=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'judul_visi' => $judul_visi,
                'deskripsi' => $deskripsi,
                
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allInsertSave($data,'mst_visi');
            ?>
            <script>
                alert("Visi Berhasil Ditambahkan");
                top.location.href="<?php echo site_url('administrator/c_profile/visi');?>";
            </script>
            <?php
        }
        public function visiEditSave(){
            $kode_visi=$_POST['pKode'];
            $judul_visi=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'kode_visi' => $kode_visi,
                'judul_visi' => $judul_visi,
                'deskripsi' => $deskripsi,
                
                'lastupdby' => 'andi',
                'lastupdtime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allEditSave($data,$kode_visi,'mst_visi','kode_visi');
            ?>
            <script>
                alert("Visi Berhasil Diubah");
                top.location.href="<?php echo site_url('administrator/c_profile/visi');?>";
            </script>
            <?php
        }
        //VISI END=============================================================================================
        //MISI=============================================================================================
		public function misi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_misi','kode_misi','ASC');
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_misilist',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function misiAdd(){
            $this->load->view('adm/profile/v_misiAdd');
        }
        public function misiEdit(){
            $kode=$_POST['kode'];
            $data['kode']=$kode;
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_misi','kode_misi',$kode);
            $this->load->view('adm/profile/v_misiEdit',$data);
        }
        public function misiDetail(){
            $kode=$_POST['kode'];
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_misi','kode_misi',$kode);
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/detail/v_misidetail',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function misiAddSave(){
            $judul_misi=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'judul_misi' => $judul_misi,
                'deskripsi' => $deskripsi,
                
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allInsertSave($data,'mst_misi');
            ?>
            <script>
                alert("Misi Berhasil Ditambahkan");
                top.location.href="<?php echo site_url('administrator/c_profile/misi');?>";
            </script>
            <?php
        }
        public function misiEditSave(){
            $kode_misi=$_POST['pKode'];
            $judul_misi=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'kode_misi' => $kode_misi,
                'judul_misi' => $judul_misi,
                'deskripsi' => $deskripsi,
                
                'lastupdby' => 'andi',
                'lastupdtime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allEditSave($data,$kode_misi,'mst_misi','kode_misi');
            ?>
            <script>
                alert("Misi Berhasil Diubah");
                top.location.href="<?php echo site_url('administrator/c_profile/misi');?>";
            </script>
            <?php
        }
        //MISI END=============================================================================================
        //DAERAH=============================================================================================
	public function daerah(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_kota','nama_kota','ASC');
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_kotaDlist',$data);
            //$this->load->view('adm/profile/v_visi');
	}
        public function kotaDDetail(){
            $kode=$_POST['kode'];
            $data['tabel']=$this->m_detail->getDetailTabel('mst_daerah','id_kota',$kode);
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/list/v_daerahlist',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function daerahAdd(){
            $kodekota=$_POST['kodekota'];
            $data['kodekota']=$kodekota;
            $this->load->view('adm/profile/v_daerahAdd',$data);
        }
        public function daerahEdit(){
            $kode=$_POST['kode'];
            $data['kode']=$kode;
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_daerah','id_pdaerah',$kode);
            //var_dump($data['tabelDetail']); exit;
            $this->load->view('adm/profile/v_daerahEdit',$data);
        }
        public function daerahDetail(){
            $kode=$_POST['kode'];
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_daerah','id_pdaerah',$kode);
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/detail/v_daerahdetail',$data);
            //$this->load->view('adm/profile/v_visi');
		}
        public function daerahAddSave(){
            $kodekota=$_POST['pKodeKota'];
            $judul_pdaerah=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'id_kota' => $kodekota,
                'judul_pdaerah' => $judul_pdaerah,
                'deskripsi' => $deskripsi,
                
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allInsertSave($data,'mst_daerah');
            ?>
            <script>
                alert("Profil Daerah Berhasil Ditambahkan");
                top.location.href="<?php echo site_url('administrator/c_profile/daerah');?>";
            </script>
            <?php
        }
        public function daerahEditSave(){
            $kode_daerah=$_POST['pKode'];
            $judul_pdaerah=$_POST['pJudul'];
            $deskripsi=$_POST['pDeskripsi'];
            
            $data=array(
                'judul_pdaerah' => $judul_pdaerah,
                'deskripsi' => $deskripsi,
                
                'lastupdby' => 'andi',
                'lastupdtime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            $this->m_profil->allEditSave($data,$kode_daerah,'mst_daerah','id_pdaerah');
            ?>
            <script>
                alert("Profil Daerah Berhasil Diubah");
                top.location.href="<?php echo site_url('administrator/c_profile/daerah');?>";
            </script>
            <?php
        }
        //DAERAH END=============================================================================================
            
	}
?>