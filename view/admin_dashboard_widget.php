<?php

/*
* Dashboard widget view
*
* @version 1.0
*
****************************/
 
function clm_display_dashboard_widget() { 
 
 	$clm_model	= new CLM_MODEL();
	
 	$limit 			= 5;
	$clm_version	= get_option('clm_version');
 	
	//call model
   	$data = $clm_model->get_all_applicants_data( $limit ); 
   
   	?>
    
    <h4>Car Loan Top 5 newest entries:</h4>
    
    <table class="widefat">
    
    	<tr>
        
        	<th>First Name:</th>
            <th>LastName:</th>
            <th>Email Address:</th>
            
        </tr>
        
		<?php
        foreach( $data as $k => $v )
        {   
        ?>
        
        <tr>
        
            <td><?php echo $v['first_name']; ?></td>
            <td><?php echo $v['last_name']; ?></td>
            <td><?php echo $v['email_address']; ?></td>
        
        </tr>
        
        <?php
        }
        ?>

    </table>
    
    <div>
        <p id="wp-version-message">You are using <strong>Car Loan Manager <?php echo $clm_version; ?></strong></p>
    </div>
    
    <?php
	
	unset( $clm_model );
	 
}  