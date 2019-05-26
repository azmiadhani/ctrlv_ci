<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
	public function __construct()
    {
            parent::__construct();

            $this->load->model('m_login');
    }

	public function index()
	{
        $this->session->sess_destroy();
		$this->load->view('login/login_v');
    }

    function aksi_login(){
        $username = $this->input->post('user');
        $password = $this->input->post('pass');
        $where = array(
            'user_id' => $username,
            'password' => md5($password)
            );
        $cek = $this->m_login->cek_login("user",$where)->num_rows();
        if($cek > 0){
     
            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );
     
            $this->session->set_userdata($data_session);
     
            redirect(base_url("home"));
        }else{
            redirect(base_url("login"));
        }
    }
 
	public function logout(){
        $this->session->sess_destroy();
        
		redirect(base_url('login'));
	}
}
