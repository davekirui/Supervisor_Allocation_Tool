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
class Allocation extends CI_Controller{
    function __construct() {
        parent::__construct();
       
       }
    
    function index()
    {
        $this->load->view('allocation_view');
    }
    function process()
    {
        $this->load->model('Allocation_Model');
        $this->load->model('Save_Model');
       $data1=array('year'=>  $this->input->post('year'),
       'category'=>$this->input->post('category'));
       
       $student_proposals=$this->Allocation_Model->student_proposals($data1); 
     
       foreach($student_proposals as $x)
       {
          $data2=array('acad_yr'=>  $this->input->post('year'),
                  'reg_no'=>$x->reg_no);
          $if_selected=$this->Allocation_Model->if_supervisor_selected($data2);
          
          if($if_selected->num_rows()!=0)
          {
              //echo $x->reg_no."  already Allocated";
          }
          else {
               $each=4;
                   $chosen=4;
              $i=1;
              while($i<=$chosen)
              {
                                   
                  $s="supervisor_".$i;
                 $sel_sup=$x->$s;
              
                 $sel_sup;
                  
                  $data3=array('acad_yr'=>  $this->input->post('year'),
                  'category'=>$this->input->post('category'),
                  'surname'=>$sel_sup); 
             
           $if_supervisor_av=$this->Allocation_Model->if_supervisor_is_available($data3);
           
           if($if_supervisor_av->num_rows()<$each)
           {
               $data=array('reg_no'=>$x->reg_no,
                   'surname'=>$sel_sup,
                   'acad_yr'=>$this->input->post('year'),
                   'category'=>$this->input->post('category'));
                  $this->Save_Model->accept_save($data); 
                  
               
                  break;         
              
           }
           
                 
                  $i++;
              }
                     
           
               }
          
       }
       $data4=array('year'=>  $this->input->post('year'),
       'category'=>$this->input->post('category'));
       $not_all=$this->Allocation_Model->not_allocated($data4);
       
       foreach($not_all as $d)
       {
           echo $d->reg_no."<br>";
           
       $data5=array('acad_yr'=>  $this->input->post('year'),        
       'project_name'=>$this->input->post('category'));
       $not_all1=$this->Allocation_Model->pending_supervisors($data5);
       
       foreach($not_all1 as $l)
       {
           $data3=array('acad_yr'=>  $this->input->post('year'),
                  'category'=>$this->input->post('category'),
                  'surname'=>$l->name);
            $if_supervisor_av=$this->Allocation_Model->if_supervisor_is_available($data3);
            
         if($if_supervisor_av->num_rows()<4)
         {
           
         $data=array('reg_no'=>$d->reg_no,
                   'surname'=>$l->name,
                   'acad_yr'=>$this->input->post('year'),
                   'category'=>$this->input->post('category'));
          
           $this->Save_Model->accept_save($data);
            
           break;
         }
        
       } 
           
       }
      $msg=array('m'=>'Long Task Completed Sucessful',
               'p'=>'index.php/Allocation'); 
           
           $this->load->view('msgs',$msg);
       
    }
}

?>
