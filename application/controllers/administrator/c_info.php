<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_info extends CI_Controller{	
		function __construct(){
                    session_start();
                    parent::__construct();
                    //$this->load->model('adm/m_global');
                    $this->load->model('adm/m_list');
                    $this->load->model('adm/m_crud');
                    $this->load->model('adm/m_detail');
                    $this->load->model('adm/m_validate');
                    $this->load->helper('adm/functions_helper');
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
		
		
		
        public function info(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('doc_data','judul_data','ASC');
            $this->load->view('adm/info/v_infoList',$data);
	}
        public function infoDetail(){
            $kode = $_POST['kode'];
            $data['tabelDetail'] = $this->m_detail->getDetailTabel('doc_data','id_data',$kode);
            $this->load->view('adm/info/v_infoDetail',$data);
        }
        public function infoAdd(){
            $this->load->view('adm/info/frmInfoAdd');
        }
        public function infoAddSave(){
            $parentDir="doc/data/";
            $alert="";
            //Ambil Element dari File
            $pFileName=$_POST['pFileName'];
            $pFileDeskripsi=$_POST['pFileDeskripsi'];
            $fileName=$_FILES["pFileUpload"]["name"];
            $fileType=$_FILES['pFileUpload']['type'];
            $fileSize=$_FILES['pFileUpload']['size'];
            $fileTmpName=$_FILES['pFileUpload']['tmp_name'];
            $fileExtension=end(explode(".",$fileName));
            $fileCreatedTime=date("Ymd_His",  time()-(60*60));
            $newFileName=$pFileName.$fileCreatedTime.".".$fileExtension;
            $fileLocation=$parentDir.$newFileName;
            $moveUpload=$fileLocation;
            
            $file=array(
                'pFileName'=>$pFileName,
                'name'=>$fileName,
                'type'=>$fileType,
                'size'=>$fileSize,
                'tmp_name'=>$fileTmpName,
                'fileExtension'=>$fileExtension,
                'fileCreatedTime'=>$fileCreatedTime,
                'newFileName'=>$newFileName,
                'moveUpload'=>$moveUpload
            );
            $data=array(
                'judul_data'=>$pFileName,
                'isi_data'=>$pFileDeskripsi,
                'fileurl'=>$fileLocation,
                'insertby'=>'andi',
                'inserttime'=>  date("Y-m-d H:i:s",  time()-(60*60))
            );
            //validasi berdasarkan nama file dan direktori
            $countDuplicate=$this->m_validate->allValidate("count(judul_data) ","doc_data","judul_data",$pFileName);
            //var_dump($countDuplicate); die;
            if($countDuplicate>=1){
                $alert=1;
                $message="Terdapat Nama File Yang Sama";
            }
            else{
                if(move_uploaded_file($fileTmpName, $moveUpload)){
                    $insert=$this->m_crud->allInsertSave($data,'doc_data');
                    $alert=0;
                    $message="File [".$pFileName."] Berhasil Diupload";
                }
                else{
                    $alert=1;
                    $message="File [".$pFileName."] Gagal Diupload";
                }
            }
            //REDIRECT
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_info/info'.'?alt='.$alert.'&msg='.$message);?>";
                </script>
            <?php
        }
        public function infoRename(){
            $id=$_POST['id'];
            $fileName=$_POST['fileName'];
            $data=array(
                'id'=>$id,
                'fileName'=>$fileName
            );
            $this->load->view('adm/info/frmInfoRename',$data);
        }
        public function infoRenameSave(){
            $alert="";
            $message="";
            $id=$_POST['pId'];
            $fileName=$_POST['pNewFileName'];
            $oldFileName=$_POST['pOldFile'];
            
            
            $data=array(
                'judul_data'=>$fileName,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'rename'
            );
            
            if(strtoupper($fileName)==strtoupper($oldFileName)){
                $alert=1; //failed
                $message="Nama File Baru dan Nama File Lama Sama";
            }
            else{
                //validasi berdasarkan nama file dan direktori
                $countDuplicate=$this->m_validate->allValidate("count(judul_data) ","doc_data","judul_data",$fileName);
                if($countDuplicate>=1){
                    $alert=1;
                    $message="Terdapat nama File yang sama";
                }
                else{
                    $rename=$this->m_crud->allEditSave($data,$id,'doc_data','id_data');
                    $alert=0;
                    $message="Nama File Berhasil Diubah";
                }
            }
            
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_info/info'."?alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
        public function infoDelete(){
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
                $deleteFile=$this->m_crud->allEditSave($data,$id,'doc_data','id_data');
                
            }
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_info/info'.$paramId."alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
    }
?>