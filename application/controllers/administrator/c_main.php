<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	class C_main extends CI_Controller{	
		function __construct(){
			session_start();
			parent::__construct();
			//if(!isset($_SESSION['username'])){
			//	redirect('c_formlogin');
			//}	
		}
		
		public function index(){
			$this->load->view('adm/v_header');
            $this->load->view('adm/v_home');
		}
                
		
	}
?>