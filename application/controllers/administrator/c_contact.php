<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_contact extends CI_Controller{	
        function __construct(){
            session_start();
            parent::__construct();
            //$this->load->model('adm/m_contact');
            $this->load->model('adm/m_list');
            $this->load->model('adm/m_detail');
            $this->load->model('adm/m_crud');
            //if(!isset($_SESSION['username'])){
            //	redirect('c_formlogin');
			//}	
        }
		
	public function kontak(){
            //echo "tes"; die;
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('mst_contact','ctcid','ASC');
            $this->load->view('adm/list/v_kontaklist',$data);
	}
        public function kontakEdit(){
            $kode=$_POST['kode'];
            $data['kode']=$kode;
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_contact','ctcid',$kode);
            $this->load->view('adm/profile/v_contactEdit',$data);
        }
        public function kontakEditSave(){
            $kode=$_POST['pId'];
            $ctcname=$_POST['pName'];
            $ctcaddress=$_POST['pAddress'];
            $ctcphone=$_POST['pPhone'];
            $ctcemail=$_POST['pEmail'];
            $ctcfax=$_POST['pFax'];
            $ctczip=$_POST['pZip'];
            
            $data=array(
                'ctcname' => $ctcname,
                'ctcphone' => $ctcphone,
                'ctcemail' => $ctcemail,
                'ctcfax' => $ctcfax,
                'ctczip' => $ctczip,
                'ctcaddress' => $ctcaddress,
                'lastupdby' => "andisiswanto",
                'lastupdtime' => date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction' => "edit kontak"
            );
                
            $this->m_crud->allEditSave($data,$kode,'mst_contact','ctcid')
            ?>
            <script>
                alert("Kontak berhasil diubah");
                window.location.href="<?php print(site_url('administrator/c_contact/kontak'));?>";
            </script>
            <?php
        }
        public function kontakDetail(){
            $kode=$_POST['kode'];
            //echo $kode; die;
            $data['tabelDetail']=$this->m_detail->getDetailTabel('mst_contact','ctcid',$kode);
            //var_dump($data['tabel']); exit;
            $this->load->view('adm/detail/v_contactdetail',$data);
            //$this->load->view('adm/profile/v_visi');
	}
        /*
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
        */
	}
?>