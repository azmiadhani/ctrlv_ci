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
        $data['user_login']=$this->session->userdata('nama');
        $this->load->view('index/home_v', $data);
    }

    public function paste(){
        $paste_id = $this->input->post('paste_id');
        $paste = $this->input->post('paste');
        $title= $this->input->post('title');
        $created_at = date("Y/m/d");
        $qrcode_id = "QR".$paste_id;
        $user_id = $this->session->userdata('nama');
        

        //Generate QRCODE
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '512'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$qrcode_id.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $qrcode_id; //data yang akan di jadikan QR CODE
        $params['level'] = 'L'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
        // End generate QRCODE

        $data = array(
            'paste_id' => $paste_id,
            'paste' => $paste,
            'title' => $title,
            'created_at' => $created_at,
            'qrcode_id' => $image_name,
            'user_id' => $user_id
            );
        $data['user_login']=$this->session->userdata('nama');
        $cek = $this->m_login->paste("paste",$data);

        if($cek == true){
            echo $cek;
            redirect(base_url("CV").$paste_id);
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
