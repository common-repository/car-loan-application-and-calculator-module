<?php

function clm_settings_page()
{
	
	
	$vehicles 		= get_option('clm_vehicles');
	$provinces 		= get_option('clm_provinces');
	$emails			= get_option('clm_emails');
	$clm_clean_db	= get_option('clm_clean_db');
	
	$vehicles 	= unserialize( $vehicles );
	$provinces 	= unserialize( $provinces );
	$emails		= unserialize( $emails );
	
	?>
    
    <!--[if gte IE 9]>
      <style type="text/css">
        .clm-gradient {
           filter: none;
        }
      </style>
    <![endif]-->
    
    <button onclick="backtoList();" class="clm-gradient">← Back to list</button>
    
    <hr />
    
    <h1>Settings</h1>
    
    <h4>Registered Vehicles:</h4>
    
    <small>(Note: add new vehicle types separated by comma.)</small><br />
    
    <form id="clm_settings_form">
    
        <textarea name="clm_vehicles" id="clm_vehicles" cols="40" rows="5"><?php
			
			$lastv = end($vehicles);
			
            foreach($vehicles as $k)
            {
				
				if( $k == $lastv )
				{
					
					echo $k;
					
				} else {
				
					echo $k.',';
					
				}
                
            }
            unset($k);
			
            ?></textarea>
            
            
         <h4>Registered Provinces:</h4>
        
        <small>(Note: add provinces separated by comma.)</small><br />
        
        <textarea name="clm_provinces" id="clm_provinces" cols="40" rows="5"><?php
			
			$lastprov = end($provinces);
			
            foreach($provinces as $k)
            {
				
                if( $k == $lastprov )
				{
					
					echo $k;
					
				} else {
				
					echo $k.',';
					
				}
				
            }
            unset($k);
			
            ?></textarea>
        
        
        
        <h4>Registered Emails:</h4>
        
        <small>(Emails listed below will be notified when a new application form has been submitted. <br />Note: Add new emails separated by comma.)<br />
        For some reasons, if you are not recieving an emails, please check your spam folders.</small><br />
        
        <textarea name="clm_emails" id="clm_emails" cols="40" rows="5"><?php
			
			$laste = end($emails);
			
            foreach($emails as $k)
            {
				
                if( $k == $laste )
				{
					
					echo $k;
					
				} else {
				
					echo $k.',';
					
				}
				
            }
            unset($k);
			
            ?></textarea>
            
            
            
       	<h4>Deactivation Option: (Note: When set to "yes", all data will be lost after deactivation.)</h4>
        
        <label>Clean Database on deactivation?</label>
        
        <select name="clm_clean_db" id="clm_clean_db">
        	<option value="no" <?php echo $clm_clean_db=='no' ? 'selected="selected"' : ''; ?>>No</option>
            <option value="yes" <?php echo $clm_clean_db=='yes' ? 'selected="selected"' : ''; ?>>Yes</option>
        </select>
        
        <input type="hidden" id="clm_save_settings_nonce" value="<?php echo wp_create_nonce('clm_save_settings_nonce'); ?>" />
        
        <div class="clearfix"></div>
        
        <button onclick="clmsaveSettings();" class="clm-gradient">Save</button>
        
        <div id="admin_update_settings_ajax_loader">
        	<img src="<?php echo CLM_URI_img.'ajax-loader.gif'; ?>" />
        </div>
    
    </form>
    
    <?php
	
}