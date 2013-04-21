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
class Graph extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('Graphing');
    }
    
    function fetch_proposals()
    {
        $sql=$this->db->query("SELECT DISTINCT sur_name FROM supervisors_sms");
        $all=array();
        foreach ($sql->result() as $d)
        {
            $i=1;
            $data=array('sur_name'=>$d->sur_name,'category'=>  $this->input->post('category'),
            'acad_yr'=>$this->input->post('acad_yr'));
            
        $rows=$this->Graphing->fetch_proposals($data)->num_rows(); 
        
        $val=array('sur_name'=>$d->sur_name,
            'count'=>$rows);          
        
        
        array_push($all,$val);
        
       
        }
       /*  foreach($all as $row){
            echo $row['sur_name']."<br>";
            echo $row['count']."<br>";
        }*/
        
        $data['read']=$all;
     
     $this->load->view('graphing',$data);
        
    }

}

?>
