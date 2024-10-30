<?php

function clm_display_admin_page()
{
	
	$clm_version = get_option('clm_version');
	
	?>
    
    <!--[if gte IE 9]>
      <style type="text/css">
        .clm-gradient {
           filter: none;
        }
      </style>
    <![endif]-->

    <div class="clm_wrapper">
    
    	<div id="settings-icon-holder">
        
        </div>
        
        <h1 class="title">
        	CAR LOAN MANAGER
        </h1>

        <div id="admin_ajax_loader">
        	<img src="<?php echo CLM_URI_img.'ajax-loader.gif'; ?>" />
        </div>
        
        <div style="float:right;">
        
        	<table>
            
            	<tr>
                	<td>Application form shortcode:</td>
                    
                    <td><span style="color:red;">[deploy_form]</span></td>
             
            	</tr>
                
                <tr>
                
                	<td>Calculator shortcode:</td>
                    
                    <td><span style="color:red;">[deploy_calculator]</span></td>
                    
                </tr>
                
                <tr>
                
                	<td>Version: <?php echo $clm_version; ?></td>
                
                </tr>
                
            </table>
            
        </div>
        
        <div class="clearfix"></div>
        
        <a href="#main" class="clm-gradient">Main</a>&nbsp;
        <a href="#settings" class="clm-gradient">Settings</a>&nbsp;
        <a href="#form-manager" id="fm-button" class="clm-gradient">Form Manager</a>&nbsp;
        <button onclick="backtoList();" class="clm-gradient">Refresh</button>
        
        <div class="clearfix" id="clm_admin_list">
        	<center><h2 class="loading_text_admin">Please wait..</h2></center>
        </div>
        
        <!--<div style="float:right">
        	<small style="color:grey;">
            	Plugin Developed by: Darryl Fernandez<br />
                For support and Inquiries, email: engrdarrylfernandez@gmail.com
            </small>
        </div>-->
        
        <div class="clearfix"></div>
    
    </div>

    <?php
	
}