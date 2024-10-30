<?php


function clm_admin_listing($res, $paginated_page, $pn, $items_per_page)
{
	
	if( empty($res) )
	{
		echo '<div style="text-align:center;"><h3>No Available Data</h3></div>';
		return;
	}
	
	$html =  '<!--[if gte IE 9]>';
    $html .= '<style type="text/css">';
    $html .= '.clm-gradient {';
    $html .= 'filter: none;';
        
    $html .= '</style>';
    $html .= '<![endif]-->';
	
	$html .= '<table class="wp-list-table widefat" cellspacing="0">';
	$html .= '<th><button onclick="delBulk();">x</button></th>';
	$html .= '<th>Buyer s Name</th>';
	$html .= '<th>Email Address</th>';
	$html .= '<th>Home Phone</th>';
	$html .= '<th>View</th>';
	$html .= '<th>Action</th>';
	
	$nonce 			= wp_create_nonce("clm_get_data_nonce");
	$nonce_del_bulk = wp_create_nonce("clm_del_bulk_nonce");
	
	foreach( $res as $k )
	{
		$html .= '<tr>';
		$html .= '<td><input type="checkbox" name="checkbox[]" id="'.$k['applicant_id'].'" /></td>';
		$html .= '<td>'.ucwords($k['first_name']).' '.ucwords($k['initial_name']).' '.ucwords($k['last_name']).'</td>';
		$html .= '<td>'.$k['email_address'].'</td>';
		$html .= '<td>'.$k['home_phone'].'</td>';
		$html .= '<td><div id="clm_view" onClick="viewEntry('.$k['applicant_id'].');"><img src="'.CLM_URI_img.'view-icon.png'.'" width="100%" /></div></td>';
		$html .= '<td><button onclick="editEntry('.$k['applicant_id'].')" class="clm-gradient">Edit</button>
					  <button onclick="delEntry('.$k['applicant_id'].')" class="clm-gradient">Delete</button></td>';
		$html .= '</tr>';
	}
	
	
	$html .= '<tr><td><input type="hidden" value="'.$nonce.'" id="clm_get_data_nonce" /></td></tr>';
	$html .= '<tr><td><input type="hidden" value="'.$nonce_del_bulk.'" id="clm_del_bulk_nonce" /></td></tr>';
	$html .= '</table>';
	
	
	
	/**********************
    * THE PAGINATION DISPLAY
    ***********************/
    
    //this is the logic to catch the current page number you are viewing
    if($pn == 0){
		
        $pn = $items_per_page;
		
        $current_page_numx = $pn / $items_per_page;
		
        //this is to fix the undefined problem logic, so stupid me
        $current_page_num = $current_page_numx - 1;
		
    } else {
		
        $current_page_num = $pn / $items_per_page;
    }
	
    $cur_page = $current_page_num + 1;
    //End of this is the logic to catch the current page number you are viewing
    
    $i = 1;
    $j = 0;
	
	$html .= "<small>Total Pages: $paginated_page | Viewing Page: $cur_page</small>";
	
	$html .= "<select name='offset' class='dropdown' id='dropdown_list_pagination' onChange='paginationData();'>";
	
    while($i < $paginated_page + 1){
    	
		if($cur_page == $i)
		{
			
    		$html .= "<option value='$j' selected='selected'>page $i</option>";
			
		} else {
			
			$html .= "<option value='$j'>page $i</option>";
			
		}

        $i++;
        $j += $items_per_page;
    }
	
    $html .= "</select>";
	
	echo $html;
	
}