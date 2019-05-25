<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl extends CI_Controller {  
	public function __construct()
    {
            parent::__construct();
            // if($this->session->userdata('status') != "login"){
            //     redirect(base_url("login"));
            // }
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
        
        $cek = $this->m_login->cek_paste("paste", $where);

        if($cek->num_rows()>0){
            $data['user'] =  $cek->row();
            $data['status'] = 0;

            $this->load->view('index/paste_v', $data);
        }
        else{
            redirect(base_url("home"));
        }
        
    }

    public function e($id){
        $where = array(
            'paste_id' => $id,
        );
        
        $cek = $this->m_login->cek_paste("paste", $where);

        if($cek->num_rows()>0){
            $data['user'] =  $cek->row();
            $data['status'] = 1;

            $this->load->view('index/paste_v', $data);
        }
        else{
            redirect(base_url("home"));
        }
    }

    public function d($id){
        $where = array(
            'paste_id' => $id,
        );

        $id_this_user = $this->session->userdata('nama');
        $cek = $this->m_login->cek_paste("paste", $where);
        
        if($cek->num_rows()>0){
            $data['user'] = $cek->row();
            $user_id_real=$data['user']->user_id;
            if($user_id_real==$id_this_user){
                $cek_delete = $this->m_login->delete_paste("paste", $where);

                if($cek_delete==true){
                    redirect(base_url("profile/v/$user_id_real"));
                }
                else{
                    redirect(base_url("home"));
                }
            }else{
                redirect(base_url("profile"));
                
            }
        }
        else{
            redirect(base_url("home"));
        }
        
    }
}
