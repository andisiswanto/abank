<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_mutasi extends CI_Controller{	
		function __construct(){
                    session_start();
                    parent::__construct();
                    //$this->load->model('adm/m_global');
                    $this->load->model('adm/m_list');
                    $this->load->model('adm/m_mutasi');
                    $this->load->model('adm/m_crud');
                    $this->load->model('adm/m_detail');
                    $this->load->model('adm/m_validate');
                    $this->load->helper('adm/functions_helper');
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
		
		
		
        public function mutasi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('trs_mutasi','inserttime','DESC');
            //$data['tabel']=$this->m_mutasi->getMutasiSum('date,sum(amount) as jumlahTotal');
            $this->load->view('adm/mutasi/v_mutasiList',$data);
	}
        public function publikasiDetail(){
            $kode = $_POST['kode'];
            $data['tabelDetail'] = $this->m_detail->getDetailTabel('doc_pub','id_pub',$kode);
            $this->load->view('adm/publikasi/v_publikasiDetail',$data);
        }
        public function mutasiAdd(){
            $this->load->view('adm/mutasi/v_mutasiForm');
        }
        public function mutasiAddSave(){
            $alert="";
            //Ambil Element dari File
            $pAmountHidden=$_POST['pAmountHidden'];
            $pDate=$_POST['pDate'];
            $pTipe=$_POST['pTipe'];
            $pDesc=$_POST['pDesc'];
            
            $data=array(
                'amount'=>$pAmountHidden,
                'date'=>$pDate,
                'type'=>$pTipe,
                'description'=>$pDesc,
                
                'insertby'=>'andi',
                'inserttime'=>  date("Y-m-d H:i:s",  time()-(60*60))
            );
            //echo "<pre>"; var_dump($file); var_dump($data); 
            
            $countDuplicate=$this->m_validate->allValidate("count(description) ","trs_mutasi","description",$pDesc);
            //var_dump($countDuplicate); die;
            if($countDuplicate>=1){
                $alert=1;
                $message="Deskripsi tidak boleh sama";
            }
            else{
                $insert=$this->m_crud->allInsertSave($data,'trs_mutasi');
                $alert=0;
                $message="[".$pDesc."] Berhasil Diupload";
            }
            
            //REDIRECT
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_mutasi/mutasi'.'?alt='.$alert.'&msg='.$message);?>";
                </script>
            <?php
        }
        public function mutasiEdit(){
            $kode=$_POST['kode'];
            $data['tabel']=$this->m_detail->getDetailTabel('trs_mutasi','id_mutasi',$kode);
            $this->load->view('adm/mutasi/v_mutasiFormEdit',$data);
        }
        public function mutasiEditSave(){
            $alert="";
            $message="";
            //Ambil Element dari File
            $id=$_POST['pId'];
            $pOldDesc=$_POST['pOldDesc'];
            $pAmountHidden=$_POST['pAmountHidden'];
            $pDate=$_POST['pDate'];
            $pTipe=$_POST['pTipe'];
            $pDesc=$_POST['pDesc'];
            
            $data=array(
                'amount' => $pAmountHidden,
                'date' => $pDate,
                'type' => $pTipe,
                'description' => $pDesc,
                
                'lastupdby' => 'andi',
                'lastupdtime' => date("Y-m-d H:i:s",  time()-(60*60)),
                'lastupdaction' => "edit"
            );
            
            if(strtoupper($pDesc)==strtoupper($pOldDesc)){
                $alert=0; //failed
                $message="Data berhasil diedit";
                $editSuccess=$this->m_crud->allEditSave($data,$id,'trs_mutasi','id_mutasi');
            }
            else{
                //validasi berdasarkan nama file dan direktori
                $countDuplicate=$this->m_validate->allValidate("count(description) ","trs_mutasi","description",$pDesc);
                if($countDuplicate>=1){
                    $alert=1;
                    $message="Ada deskripsi yang sama lho";
                }
                else{
                    $editSuccess=$this->m_crud->allEditSave($data,$id,'trs_mutasi','id_mutasi');
                    $alert=0;
                    $message="Data berhasil diedit";
                }
            }
            
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_mutasi/mutasi'."?alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
        public function publikasiDelete(){
            $alert="";$message="";
            $fileName=$_GET['fileName'];
            $id=$_GET['id'];
            $fileUrl=$_GET['fileUrl'];
            $data=array(
                'status'=>1,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'delete',
            );
            $paramId="?";
            //var_dump($fileNameExt); die;
            if (!unlink($fileUrl)){
                $alert=1;
                $message="Tidak ada file dengan nama tersebut";
            }
            else{
                $alert=0;
                $message="File berhasil dihapus";
                $deleteFile=$this->m_crud->allEditSave($data,$id,'doc_pub','id_pub');
                
            }
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_publikasi/publikasi'.$paramId."alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
    }
?>