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
        $this_user = $this->session->userdata('nama');
        redirect(base_url("profile/v/$this_user"));
    }

    public function v($id){
        $id_this_user = $this->session->userdata('nama');

        $where_this_user = array(
            'user_id' => $id_this_user
        );
        
        $where = array(
            'user_id' => $id
        );


        $cek_this_user = $this->m_login->cek_paste("user", $where_this_user);
        $cek = $this->m_login->cek_paste("user", $where);
        $cek_paste = $this->m_login->cek_paste("paste", $where);

        if($cek->num_rows()>0){
            
            $data['user'] = $cek->row();
            $data['paste'] = $cek_paste;
            $data['this_user'] = $cek_this_user->row();
            // $data['user'] =  $this->m_login->cek_paste("paste", $where)->row();
        
            $this->load->view('profile/profile_v', $data);
        }
        else{
            redirect(base_url("home"));
        }
        
    }
}
