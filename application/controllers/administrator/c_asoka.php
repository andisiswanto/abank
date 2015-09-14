<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_asoka extends CI_Controller{	
        function __construct(){
            session_start();
            parent::__construct();
            //$this->load->model('adm/m_global');
            $this->load->model('adm/m_list');
            $this->load->model('adm/m_asoka');
            $this->load->model('adm/m_crud');
            $this->load->model('adm/m_detail');
            $this->load->model('adm/m_validate');
            $this->load->helper('adm/functions_helper');
            if(!isset($_SESSION['usrnameAbk'])){
                redirect('administrator/c_login');
            }	
        }
		
		
	function cart(){
            //$this->load->view('adm/v_header');
            $this->load->view('adm/asoka/chartPertama');
        }	
        public function mutasi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('trs_asoka','id_asoka','DESC');
            $this->load->view('adm/asoka/v_mutasiList',$data);
	}
        public function mutasiHarian(){
            $this->load->view('adm/v_header');
            //$data['tabel']=$this->m_list->getListTabel('trs_asoka','inserttime','DESC');
            //$data['tabel']=$this->m_asoka->getMutasiSum('date,sum(amount) as jumlahTotal');
            $data['tabel']=$this->m_asoka->getMutasiHarian();
            $this->load->view('adm/asoka/v_mutasiListHarian',$data);
	}
        public function mutasiAdd(){
            $this->load->view('adm/asoka/v_mutasiForm');
        }
        public function mutasiAddSave(){
            $pDate=$_POST['pDate'];
            $pTipe=$_POST['pTipe'];
            $pFromTo=$_POST['pFromTo'];
            $pDesc=$_POST['pDesc'];
            $pAmountHidden=$_POST['pAmountHidden'];
            
            //var_dump($pTipe);
            for($x=0;$x<5;$x++){ //menghitung jumlah semua inputan, berdasarkan total kkks
                if(isset($_POST["pChk".$x])){
                    $pChk[$x]=$_POST["pChk".$x];
                    $data=array(
                        'amount'=>$pAmountHidden[$x],
                        'fromto'=>$pFromTo[$x],
                        'date'=>$pDate,
                        'type'=>$pTipe[$x],
                        'description'=>$pDesc[$x],

                        'insertby'=>'andi',
                        'inserttime'=>  date("Y-m-d H:i:s",  time()-(60*60))
                    );
                    $insert=$this->m_crud->allInsertSave($data,'trs_asoka');
                }
                else{
                    $pChk[$x]="off";
                } 
            }
            //var_dump($pChk); 
            //die;
            
            $alert=0;
            $message="Data Berhasil Diupload";
            
            //REDIRECT
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_asoka/mutasi'.'?alt='.$alert.'&msg='.$message);?>";
                </script>
            <?php
        }
        public function mutasiEdit(){
            $kode=$_POST['kode'];
            $data['tabel']=$this->m_detail->getDetailTabel('trs_asoka','id_asoka',$kode);
            $this->load->view('adm/asoka/v_mutasiFormEdit',$data);
        }
        public function mutasiEditSave(){
            $alert="";
            $message="";
            //Ambil Element dari File
            $id=$_POST['pId'];
            $pOldDesc=$_POST['pOldDesc'];
            $pAmountHidden=$_POST['pAmountHidden'];
            $pFromTo=$_POST['pFromTo'];
            $pDate=$_POST['pDate'];
            $pTipe=$_POST['pTipe'];
            $pDesc=$_POST['pDesc'];
            
            $data=array(
                'amount' => $pAmountHidden,
                'fromto' => $pFromTo,
                'date' => $pDate,
                'type' => $pTipe,
                'description' => $pDesc,
                
                'lastupdby' => 'andi',
                'lastupdtime' => date("Y-m-d H:i:s",  time()-(60*60)),
                'lastupdaction' => "edit"
            );
            
//            if(strtoupper($pDesc)==strtoupper($pOldDesc)){
//                $alert=0; 
//                $message="Data berhasil diedit";
//                $editSuccess=$this->m_crud->allEditSave($data,$id,'trs_asoka','id_asoka');
//            }
//            else{
                //validasi berdasarkan nama file dan direktori
//                $countDuplicate=$this->m_validate->allValidate("count(description) ","trs_asoka","description",$pDesc);
//                if($countDuplicate>=1){
//                    $alert=1;
//                    $message="Ada deskripsi yang sama lho";
//                }
//                else{
                    $editSuccess=$this->m_crud->allEditSave($data,$id,'trs_asoka','id_asoka');
                    $alert=0;
                    $message="Data berhasil diedit";
//                }
//            }
            
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_asoka/mutasi'."?alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
    }
?>