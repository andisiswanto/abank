<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class C_login extends CI_Controller{
		function __construct(){
			session_start();
			parent::__construct();
		}
		public function index(){
			$this->load->library('form_validation'); //load library form_validation
			$this->form_validation->set_rules('username','Username','required'); //cek, validasi username
			$this->form_validation->set_rules('password','Password','required|min_length[4]'); //cek, validasi password
			if($this->form_validation->run()==TRUE){ //apabila validasi true
                            $this->load->model('adm/m_user'); //load model m_user
                            $result=$this->m_user->cek_user_login( //jalankan fungsi cek_user_login dari model
                                $this->input->post('username'), //menangkap username dari form
                                $this->input->post('password') //menangkap password dari form
                            );
                            if($result==TRUE){ //Apabila ada data
                                            $this->load->model('m_user'); //load model m_user
                                            $result=$this->m_user->cekUserstat($this->input->post('username'));
                                            //$this->m_user->makeExpired();
                                            foreach($result as $rs){
                                                    $isAdmin=$rs->isadmin;
                                                    $usrid=$rs->usrid;
                                                    $usrname=$rs->usrname;
                                                    $usrpass=$rs->usrpass;
                                            }
                                            //var_dump($stat); exit;
                                            $_SESSION['usernameAbk']=$this->input->post('username');
                                            $_SESSION['isadminAbk']=$isAdmin;
                                            $_SESSION['usridAbk']=$usrid;
                                            $_SESSION['usrnameAbk']=$usrname;
                                            $_SESSION['usrpassAbk']=$usrpass;
                                            redirect('administrator/c_main'); 
                                            
                        }
                    }
            
			$this->load->view('adm/login/v_login'); //apabila session kosong load login/v_form
		}
		public function logout(){ //fungsi logout
                    //session_destroy(); //session destroy All
                    unset($_SESSION['usernameAbk']);
                    unset($_SESSION['isadminAbk']);
                    unset($_SESSION['usridAbk']);
                    unset($_SESSION['usrnameAbk']);
                    unset($_SESSION['usrpassAbk']);
                    redirect('administrator/c_login');
		}
	}
?>