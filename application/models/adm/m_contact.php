<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class M_contact extends CI_Model{
	function __construct(){
                    $this->load->model('adm/m_contact');
			//session_start();
			parent::__construct();
	}
              
    }
?>