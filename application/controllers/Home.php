<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {  
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
        $id=$this->session->userdata('nama');
        $data = array(
            'user' => $id,
        );
        $this->load->view('index/home_v', $data);
    }

    public function paste(){
        $paste_id = $this->input->post('paste_id');
        $paste = $this->input->post('paste');
        $title= $this->input->post('title');
        $created_at = date("Y/m/d");
        $qrcode_id = "QR".$paste_id;
        $user_id = $this->session->userdata('nama');

        $data = array(
            'paste_id' => $paste_id,
            'paste' => $paste,
            'title' => $title,
            'created_at' => $created_at,
            'qrcode_id' => $qrcode_id,
            'user_id' => $user_id
            );
        $cek = $this->m_login->paste("paste",$data);

        if($cek == true){
            echo $cek;
            redirect(base_url("ctrl/v/$paste_id"));
        }else{
            echo "Database Error tidak bisa insert";
            redirect(base_url("home"));
        }
    }

    public function paste_edit(){
        $paste_id = $this->input->post('paste_id');
        $paste = $this->input->post('code');
        $title = $this->input->post('title');
        $created_at = $this->input->post('created_at');
        $qrcode_id = $this->input->post('qrcode_id');
        $user_id = $this->input->post('user_id');

        
        $data = array(
            'paste_id' => $paste_id,
            'paste' => $paste,
            'title' => $title,
            'created_at' => $created_at,
            'qrcode_id' => $qrcode_id,
            'user_id' => $user_id
            );
        $cek = $this->m_login->update_paste("paste",$data);

        if($cek == true){
            echo $cek;
            redirect(base_url("ctrl/v/$paste_id"));
        }else{
            echo "Database Error tidak bisa insert";
            redirect(base_url("home"));
        }
    }
}
