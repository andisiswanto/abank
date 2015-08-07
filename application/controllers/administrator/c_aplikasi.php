<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_aplikasi extends CI_Controller{	
		function __construct(){
			session_start();
			parent::__construct();
            $this->load->model('adm/m_aplikasi');
            $this->load->model('adm/m_crud');
            $this->load->model('adm/m_validate');
            $this->load->helper('adm/functions_helper');
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
		
		
		
        public function linkinternal(){
            if(empty($_GET['id'])){
                $parentId=0;
            }
            else{
                $parentId=$_GET['id'];
            }
            $data['parent_id']=$parentId;
            //get parent direktori
            $direktori=getDirektori($parentId);
            $backDir=getBackDir($parentId);
            $data['direktori']=$direktori;
            $data['backDir']=$backDir;
            
            $this->load->view('adm/v_header');
            //echo "<pre>"; var_dump($result); echo $data['direktory']; die;
            $data['internal']=$this->m_aplikasi->getRootData1_order2('root','parent_id',$parentId,'type','description','ASC');
            $this->load->view('adm/aplikasi/v_internal',$data);
	}
        public function makeNewFolder(){
            $parentId=$_POST['parentId'];
            $direktori=$_POST['direktori'];
            $data['parentId']=$parentId;
            $data['direktori']=$direktori;
            $this->load->view('adm/aplikasi/frmNewFolder',$data);
        }
        public function makeNewFile(){
            $parentId=$_POST['parentId'];
            $direktori=$_POST['direktori'];
            $data=array(
                'parentId'=>$parentId,
                'direktori'=>$direktori
            );
            $this->load->view('adm/aplikasi/frmNewFile',$data);
        }
        public function makeNewFileSave(){
            $parentId=$_POST['pParentId'];
            $direktori=$_POST['pDirektori'];
            $parentDir="doc/internal/";
            $dir=$parentDir.$direktori;
            $alert="";
            if($parentId==0){
                $paramId="?id=";
            }
            else{
                $paramId="?id=".$parentId;
            }
            //Ambil Element dari File
            $pFileName=$_POST['pFileName'];
            $fileName=$_FILES["pFileUpload"]["name"];
            $fileType=$_FILES['pFileUpload']['type'];
            $fileSize=$_FILES['pFileUpload']['size'];
            $fileTmpName=$_FILES['pFileUpload']['tmp_name'];
            $fileExtension=end(explode(".",$fileName));
            $fileCreatedTime=date("Ymd_His",  time()-(60*60));
            $newFileName=$pFileName.$fileCreatedTime.".".$fileExtension;
            $fileLocation=$direktori.$newFileName;
            $moveUpload=$parentDir.$fileLocation;
            
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
                'parent_id'=>$parentId,
                'description'=>$pFileName,
                'type'=>'fi',
                'dir'=>$direktori,
                'filename'=>$newFileName,
                'filelocation'=>$fileLocation,
                'insertby'=>'andi',
                'inserttime'=>  date("Y-m-d H:i:s",  time()-(60*60))
            );
            //echo "<pre>"; var_dump($file); var_dump($data); 
            
            if(move_uploaded_file($fileTmpName, $moveUpload)){
                $insert=$this->m_crud->allInsertSave($data,'root');
                $alert=0;
                $message="File ".$pFileName." Berhasil Diupload";
            }
            else{
                $alert=1;
                $message="File ".$pFileName." Gagal Diupload";
            }
            //REDIRECT
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId."&alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
        public function makeNewFolderSave(){
            $parentId = $_POST['pParentId'];
            $direktori = $_POST['pDirektori'];
            $folderName = $_POST['pFolderName'];
            $parentDir = "doc/internal";
            $dir = $parentDir."/".$direktori;
            //echo $dir; die;
            
            $data = array(
                'parent_id' => $parentId,
                'description' => $folderName,
                'type' => 'f',
                'dir' => $direktori,
                'insertby' => 'andi',
                'inserttime' => date("Y-m-d H:i:s",time()-(60*60)),
            );
            if($parentId==0){
                $paramId="?id=";
            }
            else{
                $paramId="?id=".$parentId;
            }
            
            //CEK FOLDER
            if(is_dir($dir.$folderName)){
                $alert=1;
                $message="Folder ".$folderName." sudah ada";
            }
            else{
                    //CREATE FOLDER
                    mkdir($dir.$folderName);
                    //SAVE TO DATABASE
                    $insert=$this->m_crud->allInsertSave($data,'root');
                    $alert=0;
                    $message="Folder ".$folderName." berhasil dibuat";
            }
            //REDIRECT
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId."&alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
        public function renameFile(){
            $id=$_POST['id'];
            $parentId=$_POST['parentId'];
            $direktori=$_POST['direktori'];
            $fileName=$_POST['fileName'];
            $dirFolder=$_POST['dirFolder'];
            $data=array(
                'id'=>$id,
                'parentId'=>$parentId,
                'direktori'=>$direktori,
                'fileName'=>$fileName,
                'dirFolder'=>$dirFolder
            );
            $this->load->view('adm/aplikasi/frmRenFile',$data);
        }
        public function renameFileSave(){
            $alert="";
            $message="";
            $id=$_POST['pId'];
            $parentId=$_POST['pParentId'];
            $direktori=$_POST['pDirektori'];
            //$oldFolder=$_POST['pOldFolder'];
            $fileName=$_POST['pNewFileName'];
            $oldFileName=$_POST['pOldFile'];
            
            //$parentDir = "doc/internal/";
            //$dirFolder=$_POST['pDirFolder'];
            //$oldFullDir=$parentDir.$dirFolder;
            //$fullDir=$parentDir.$direktori.$folderName;
            
            $data=array(
                'description'=>$fileName,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'rename fileName'
            );
            //var_dump($data); die;
            if($parentId==0){
                $paramId="?id=";
            }
            else{
                $paramId="?id=".$parentId;
            }
            
            if(strtoupper($fileName)==strtoupper($oldFileName)){
                $alert=1; //failed
                $message="Nama File Baru dan Nama File Lama Sama";
            }
            else{
                //validasi berdasarkan nama file dan direktori
                $countDuplicate=$this->m_validate->allValidate2("count(description) ","root","description",$fileName,"dir",$direktori);
                if($countDuplicate>=1){
                    $alert=1;
                    $message="Terdapat Nama File Yang Sama Di Folder Ini";
                }
                else{
                    $rename=$this->m_crud->allEditSave($data,$id,'root','id');
                    $alert=0;
                    $message="Nama File Berhasil Diubah";
                }
            }
            
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId."&alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
        public function renameFolder(){
            $id=$_POST['id'];
            $parentId=$_POST['parentId'];
            $direktori=$_POST['direktori'];
            $folderName=$_POST['folderName'];
            $dirFolder=$_POST['dirFolder'];
            $data=array(
                'id'=>$id,
                'parentId'=>$parentId,
                'direktori'=>$direktori,
                'folderName'=>$folderName,
                'dirFolder'=>$dirFolder
            );
            $this->load->view('adm/aplikasi/frmRenFolder',$data);
        }
        public function renameFolderSave(){
            $id=$_POST['pId'];
            $parentId=$_POST['pParentId'];
            //echo $id."/".$parentId; die;
            $direktori=$_POST['pDirektori'];
            $oldFolder=$_POST['pOldFolder'];
            $folderName=$_POST['pNewFolder'];
            
            $parentDir = "doc/internal/";
            $dirFolder=$_POST['pDirFolder'];
            $oldFullDir=$parentDir.$dirFolder;
            $fullDir=$parentDir.$direktori.$folderName;
            
            $data=array(
                'description'=>$folderName,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'rename folder'
            );
            //var_dump($data); die;
            if($parentId==0){
                $paramId="?id=";
            }
            else{
                $paramId="?id=".$parentId;
            }
            //echo $oldFullDir."-".$fullDir; die;
            if(is_dir($oldFullDir)){ //Jika Folder ada
                if(is_dir($fullDir)){ //Jika Folder Baru namanya sama dengan Folder Lainnya
                    ?><script>alert("Folder Sudah Ada");</script><?php    
                }
                else{
                    //var_dump($data); die;
                    rename($oldFullDir,$fullDir); 
                    $rename=$this->m_crud->allEditSave($data,$id,'root','id');
                    ?>
                    <script>alert("Nama Folder Berhasil Diubah");</script>
                    <?php
                }
            }
            else{
                ?><script>alert("Folder Tidak Ada, Cek Folder di direktori yang bersangkutan");</script><?php
            }
            ?>
                <script>top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId);?>";</script>
            <?php
        }
        function deleteDirectory($directory)
        {
            //var_dump($directory); die;
            if(!$dh=opendir($directory)){
                return false;
            }

            while($file=readdir($dh)){
                if($file == "." || $file == ".."){
                    continue;
                }

                if(is_dir($directory."/".$file)){
                    $this->deleteDirectory($directory."/".$file);
                }

                if(is_file($directory."/".$file)){
                    unlink($directory."/".$file);
                }
            }

            closedir($dh);

            rmdir($directory);
        }
        public function deleteFolder(){
            $parentId=$_GET['parentId'];
            $id=$_GET['id'];
            $dirFolder=$_GET['dirFolder'];
            $data=array(
                'status'=>1,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'delete folder',
            );
            //sini
            $parentDir = "doc/internal";
            $fullDir=$parentDir."/".$dirFolder;
            if($parentId==0){$paramId="?id=";}
            else{$paramId="?id=".$parentId;}
            
            if(is_dir($fullDir)){
                //var_dump($fullDir); 
                //die;
                
                $this->deleteDirectory($fullDir);
                $deleteFolder=$this->m_crud->allEditSave($data,$id,'root','id');
                $deleteFileInside=$this->m_crud->allEditSave($data,$id,'root','parent_id');
                ?>
                <script>
                    alert("Folder Berhasil Dihapus");
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId);?>";
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Tidak terdapat folder dengan nama tersebut");
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId);?>";
                </script>
            <?php
            } 
        }
        public function deleteFile(){
            $alert="";$message="";
            $fileNameExt=$_GET['fileNameExt'];
            $parentId=$_GET['parentId'];
            $id=$_GET['id'];
            $dirFolder=$_GET['dirFolder'];
            $data=array(
                'status'=>1,
                'lastupdby'=>'andisiswanto',
                'lastupdtime'=>date("Y-m-d H:i:s",time()-(60*60)),
                'lastupdaction'=>'delete file',
            );
            $parentDir = "doc/internal";
            $fullDir=$parentDir."/".$dirFolder;
            if($parentId==0){$paramId="?id=";}
            else{$paramId="?id=".$parentId;}
            //var_dump($fileNameExt); die;
            if (!unlink($fileNameExt)){
                $alert=1;
                $message="Tidak ada file dengan nama tersebut";
            }
            else{
                $alert=0;
                $message="File berhasil dihapus";
                $deleteFile=$this->m_crud->allEditSave($data,$id,'root','id');
                
            }
            ?>
                <script>
                    top.location.href="<?php echo site_url('administrator/c_aplikasi/linkinternal'.$paramId."&alt=".$alert."&msg=".$message);?>";
                </script>
            <?php
        }
    }
?>