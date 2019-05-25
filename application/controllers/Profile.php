<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {  
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
        $where = array(
            'user_id' => $this->session->userdata('nama'),
        );
        
        $cek = $this->m_login->cek_paste("user", $where);
        $cek_paste = $this->m_login->cek_paste("paste", $where);

        if($cek->num_rows()>0){
            
            $data['user'] = $cek->row();
            $data['paste'] = $cek_paste;
            // $data['user'] =  $this->m_login->cek_paste("paste", $where)->row();
        
            $this->load->view('profile/profile_v', $data);
        }
        else{
            redirect(base_url("home"));
        }
        
    }
}
