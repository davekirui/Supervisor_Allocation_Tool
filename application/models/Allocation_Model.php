<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Allocation
 *
 * @author java
 */
class Allocation_Model extends CI_Model{
    
    function student_proposals($data1)
    {
       $sql1=$this->db->query("SELECT * FROM students_proposals WHERE year=? AND category=?",$data1);
       return $sql1->result();
    }
    
    function if_supervisor_selected($data2)
    {
       $sql2=$this->db->query("SELECT * FROM allocation WHERE acad_yr=? AND reg_no=?",$data2);
       return $sql2;
    }
    
    function if_supervisor_is_available($data3)
    {
        $sql3=$this->db->query("SELECT * FROM allocation WHERE acad_yr=? AND category=? AND surname=?",$data3);
       return $sql3;
    }
    function not_allocated($data4)
    {
       $sql4=$this->db->query("SELECT * FROM students_proposals WHERE year=? AND category=? AND reg_no NOT IN(SELECT reg_no FROM allocation WHERE acad_yr=students_proposals.year AND category=students_proposals.category)",$data4);
       return $sql4->result();
    }
    function pending_supervisors($data5)
    {
       $sql5=$this->db->query("SELECT * FROM supervisors_available WHERE acad_yr=? AND project_name=?",$data5);
       return $sql5->result();
    }
}

?>
