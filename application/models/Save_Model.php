<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Save_Model
 *
 * @author java
 */
class Save_Model extends CI_Model{
  function save_proposals($data)
  {      
      $this->db->insert('students_proposals',$data);
  }
  function check_proposal($data1)
  {
    $sql1=$this->db->query("SELECT * FROM students_proposals WHERE year=? AND category=? AND reg_no=?",$data1);
    return $sql1->num_rows();
  }
   function supervisors_available($data)
  {      
      $this->db->insert('supervisors_available',$data);
  }
  function add_supervisors($data)
  {      
      $this->db->insert('supervisors',$data);
  }
   function add_timeline($data)
  {      
      $this->db->insert('timeline',$data);
  }
  function supervisors_available_check($data)
  {
     $sql=$this->db->query("SELECT * FROM supervisors_available WHERE name=? AND acad_yr=? AND project_name=?",$data);
     return $sql->num_rows();
  }
  //Check B4 Allocating if already Accepted
  function check($datas)
  {
      $sql=$this->db->query("SELECT * FROM allocation WHERE reg_no=? AND acad_yr=?",$datas);
      return $sql->num_rows();
  }
  function accept_save($data)
  {
      $this->db->insert('allocation',$data);
  }
  function login_supervisor($data)
  {
       $sql=$this->db->query("SELECT * FROM supervisors WHERE sur_name=? AND password=?",$data);
       return $sql->num_rows();
  }
  
  function check_timeline($criteria)
  {
     $sql=$this->db->query("SELECT * FROM timeline WHERE  category=? AND acad_yr=?",$criteria); 
     return $sql->result();
  }
  function send_sms($sur)
  {
      $sms=$this->db->query("SELECT * FROM supervisors WHERE  sur_name=?",$sur);
      return $sms->result();
  }
}

?>
