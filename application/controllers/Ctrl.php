<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl extends CI_Controller {  
	public function __construct()
    {
            parent::__construct();
            if($this->session->userdata('status') != "login"){
                redirect(base_url("login"));
            }
            $this->load->model('m_login');
    }

	public function index()
	{
		redirect(base_url("home"));
    }

    public function v($id){
        $where = array(
            'paste_id' => $id,
            );

        $data['user'] =  $this->m_login->cek_paste("paste", $where);
            
        $this->load->view('index/paste_v', $data);
    }
}
