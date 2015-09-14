<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_learn extends CI_Controller{	
        function __construct(){
            session_start();
            parent::__construct();
            $this->load->model('adm/m_list');
            $this->load->model('adm/m_crud');
            $this->load->model('adm/m_validate');
            $this->load->helper('adm/functions_helper');
            //if(!isset($_SESSION['username'])){
            //	redirect('c_formlogin');
            //}	
        }
		
		
		
        public function escapeQuery(){ //anticipate sql_injection
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_list->getListTabel('trs_asoka','id_asoka','DESC');
            $this->load->view('adm/asoka/v_mutasiList',$data);
	}
    }
?>