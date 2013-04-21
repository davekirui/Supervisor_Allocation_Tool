<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Graphing
 *
 * @author java
 */
class Graphing extends CI_Model{
   
    function fetch_proposals($data)
    {
        
        $rep=$this->db->query("SELECT * FROM supervisors_sms WHERE sur_name=? AND category=? AND acad_yr=? ",$data);
        return $rep;
    }

}

?>
