<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_publikasi extends CI_Controller{	
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
		
		
		
        public function publikasi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('doc_pub','judul_pub','ASC');
            $this->load->view('adm/publikasi/v_publikasiList',$data);
	}
        public function publikasiDetail(){
            $kode = $_POST['kode'];
            $data['tabelDetail'] = $this->m_detail->getDetailTabel('doc_pub','id_pub',$kode);
            $this->load->view('adm/publikasi/v_publikasiDetail',$data);
        }
        public function publikasiAdd(){
            $this->load->view('adm/publikasi/frmPublikasiAdd');
        }
        public function publikasiAddSave(){
            $parentDir="doc/publikasi/";
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
                'judul_pub'=>$pFileName,
                'isi_pub'=>$pFileDeskripsi,
                'fileurl'=>$fileLocation,
                'insertby'=>'andi',
                'inserttime'=>  date("Y-m-d H:i:s",  time()-(60*60))
            );
            //echo "<pre>"; var_dump($file); var_dump($data); 
            
            $countDuplicate=$this->m_validate->allValidate("count(judul_pub) ","doc_pub","judul_pub",$pFileName);
            //var_dump($countDuplicate); die;
            if($countDuplicate>=1){
                $alert=1;
                $message="Terdapat Nama File Yang Sama";
            }
            else{
                if(move_uploaded_file($fileTmpName, $moveUpload)){
                    $insert=$this->m_crud->allInsertSave($data,'doc_pub');
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
                    top.location.href="<?php echo site_url('administrator/c_publikasi/publikasi'.'?alt='.$alert.'&msg='.$message);?>";
                </script>
            <?php
        }
        public function publikasiRename(){
            $id=$_POST['id'];
            $fileName=$_POST['fileName'];
            $data=array(
                'id'=>$id,
                'fileName'=>$fileName
            );
            $this->load->view('adm/publikasi/frmPublikasiRename',$data);
        }
        public function publikasiRenameSave(){
            $alert="";
            $message="";
            $id=$_POST['pId'];
            $fileName=$_POST['pNewFileName'];
            $oldFileName=$_POST['pOldFile'];
            
            
            $data=array(
                'judul_pub'=>$fileName,
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
                $countDuplicate=$this->m_validate->allValidate("count(judul_pub) ","doc_pub","judul_pub",$fileName);
                if($countDuplicate>=1){
                    $alert=1;
                    $message="Terdapat Nama File Yang Sama Di Folder Ini";
                }
                else{
                    $rename=$this->m_crud->allEditSave($data,$id,'doc_pub','id_pub');
                    $alert=0;
                    $message="Nama File Berhasil Diubah";
                }
            }
            
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_publikasi/publikasi'."?alt=".$alert."&msg=".$message);?>";
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