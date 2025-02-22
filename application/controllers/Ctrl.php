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
            $this->load->helper('file');
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
            $data['status_login']=$this->session->userdata('status');
            $data['user_login']=$this->session->userdata('nama');
            

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
            $data['status_login']=$this->session->userdata('status');
            $data['user_login']=$this->session->userdata('nama');

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
            $data['status_login']=$this->session->userdata('status');
            $data['user_login']=$this->session->userdata('nama');
            $user_id_real=$data['user']->user_id;
            if($user_id_real==$id_this_user){
                $cek_delete = $this->m_login->delete_paste("paste", $where);

                if($cek_delete==true){
                    // Delete QRCode
                    $pathtodir = getcwd(); // get ultimate path
                    $get_file = $pathtodir."/assets/images/"."QR".$id.'.png';
                    $data['test'] = $pathtodir;
                    // $this->load->view('test', $data);
                    unlink($get_file); 
                    //End of Delete QRCode

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
