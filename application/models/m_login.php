<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
  }

  function cek_paste($table,$where){		
    return $this->db->get_where($table,$where);
  }

  function get_paste($table){		
    return $this->db->get($table);
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

  function update_paste($table,$data){		
    $this->db->trans_start();
    $this->db->replace($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  function delete_paste($table,$data){		
    $this->db->trans_start();
    $this->db->delete($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
}