        <?php
       if($this->session->userdata('activation_state')==1)
       {
           echo "Student:".$this->session->userdata('reg_no');           
       }
      else if($this->session->userdata('activation_state')==0)
       {     
          echo "Guest Account..."?>
		  <a href="<?php echo site_url('redirect/xcoder_login')?>">Get Full Access</a>
		 <?php
		    
       }
 else {
           
}

        ?>

