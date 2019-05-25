<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
  }

    function cek_paste($table,$where){		
    return $this->db->get_where($table,$where)->row();
  }

  function register($table,$data){		
    $this->db->trans_start();
    $this->db->insert($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  function paste($table,$data){		
    $this->db->trans_start();
    $this->db->insert($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

}