<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class C_report extends CI_Controller{	
        function __construct(){
            session_start();
            parent::__construct();
            //$this->load->model('adm/m_global');
            $this->load->model('adm/m_list');
            $this->load->model('adm/m_report');
            $this->load->model('adm/m_crud');
            $this->load->model('adm/m_detail');
            $this->load->helper('adm/functions_helper');
            if(!isset($_SESSION['usrnameAbk'])){
                redirect('administrator/c_login');
            }	
        }
		
		
        public function asoka(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_report->getRepMutasiAsoka();
            $this->load->view('adm/report/repMutasiAsoka',$data);
            $this->load->view('adm/v_footer');
	}
        public function mutasi(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_report->getRepMutasiAndi();
            $this->load->view('adm/report/repMutasiAndi',$data);
            $this->load->view('adm/v_footer');
	}
        public function utang(){
            $this->load->view('adm/v_header');
            $data['tabel']=$this->m_report->getRepMutasiUtang();
            $this->load->view('adm/report/repMutasiUtang',$data);
            $this->load->view('adm/v_footer');
	}
    }
?>