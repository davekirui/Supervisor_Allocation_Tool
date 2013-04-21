<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Check
 *
 * @author java
 */
class Check extends CI_Controller{
    
    function index()
    {
        $xcoder=new grocery_CRUD(); 
        
        $key=array('reg_no'=>  $this->input->post('reg_no')
           );
        
        $xcoder->set_table('allocation');
        $xcoder->where($key);
        $xcoder->set_theme('datatables');
        $xcoder->unset_delete();
        $xcoder->unset_add();
        
        $xcoder->unset_edit();
        
        $output=$xcoder->render();
        
        $this->load->view("allocation_report",$output);
        
    }
}

?>
