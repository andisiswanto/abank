<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class C_gallery extends CI_Controller{	
		function __construct(){
			session_start();
			parent::__construct();
            $this->load->model('m_profil');
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
		
		public function gallery(){
            $this->load->view('v_header');
            $this->load->view('gallery/v_galleryAdd');
		}
        public function sejarahAddSave(){
            $judul_sejarah=$_POST['judul_sejarah'];
            $deskripsi=$_POST['deskripsi'];
            
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
                top.location.href="<?php echo site_url('c_profile/sejarah');?>";
            </script>
            <?php
        }
		public function struktur(){
            $this->load->view('v_header');
            $this->load->view('profile/v_struktur');
		}
        public function visi(){
            $this->load->view('v_header');
            $this->load->view('profile/v_visi');
		}
	}
?>