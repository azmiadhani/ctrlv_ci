<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {  
	public function __construct()
    {
            parent::__construct();
            $this->load->model('m_login');
    }

	public function index()
	{
		$this->load->view('login/register_v');
    }

    public function register()
    {
        $email = $this->input->post('email');
        $username = $this->input->post('user');
        $join_date=$this->input->post('date');
        $password =  $this->input->post('pass');
        $hash='0';
        $active='1';
        
        $data = array(
            'email' => $email,
            'user_id' => $username,
            'password' => md5($password),
            'hash' => $hash,
            'active' => $active,
            'join_date' => $join_date
            );
        $cek = $this->m_login->register("user",$data);

        if($cek == true){
            echo $cek;
            redirect(base_url("Login"));
        }else{
            echo "Database Error tidak bisa insert";
            redirect(base_url("Register"));
        }
    }
}
