// JavaScript Document


jQuery(document).ready(function($){

	//get hashchange for view
	detectHashChange($);
	
});

function getDataList($){

	var action = 'clm_get_data';
	
	$("#admin_ajax_loader").show();
	
	$.post(ajaxurl, { action:action }, function(response){
		
		$("#admin_ajax_loader").hide();
		
		$("#clm_admin_list").html(response);
		
	});

}


function backtoList()
{
	
	var action = 'clm_get_data';
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery.post(ajaxurl, { action:action }, function(response){
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#clm_admin_list").html(response);
		
	});
	
}


function paginationData()
{
	
	var action = 'clm_get_data';
	
	var pn = jQuery("#dropdown_list_pagination").val();
	
	jQuery("#admin_ajax_loader").show();
	
	
	jQuery.post(ajaxurl, { action:action, pn:pn }, function(response){
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#clm_admin_list").html(response);
		
	});
	
	
}


function delEntry(e)
{
	
	var applicant_id = e;
	
	var clm_nonce = jQuery("#clm_get_data_nonce").val();
	
	var action = 'clm_del_entry';
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery.post(ajaxurl, { action:action, applicant_id:applicant_id, clm_nonce:clm_nonce }, function(response){
		
		jQuery("#admin_ajax_loader").hide();
		
		paginationData();
		
	});
	
}


function editEntry(e)
{
	
	var applicant_id = e;
	
	var action = 'clm_edit_entry';
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery.post(ajaxurl, { action:action, applicant_id:applicant_id }, function(response){
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#clm_admin_list").html(response);
		
	});
	
}


function updateEntry()
{
		
	var serializeData = jQuery("#form_edit_clm_entry").serialize();
	
	if( !checkMail( jQuery("#email").val() ) )
	{
		alert('Invalid Email Format!');
		return;
	}
	
	jQuery("#ajax_loader").show();
	jQuery("#admin_edit_ajax_loader").show();
	
	
	jQuery.post(ajaxurl, serializeData, function(response) {
		
		jQuery("#ajax_loader").hide();
		
		jQuery("#admin_edit_ajax_loader").hide();
		
		jQuery("html, body").animate({scrollTop: 0},1000);
		
		jQuery("#clm_admin_list").prepend(response);
		
	});

	
}


function viewEntry(e)
{
	
	var applicant_id = e;
	
	var action = 'clm_view_entry';
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery.post(ajaxurl, {applicant_id:applicant_id,action:action}, function(response) {
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#clm_admin_list").html(response);
		
	});
	
}


function getCsv(e)
{
	
	var applicant_id 	= e;
	
	var action 			= 'clm_get_xml';
	
	var csv_nonce 		= jQuery("#csv_nonce").val();
	
	var csv_url			= jQuery("#csv_url").val();
	
	jQuery("#admin_ajax_loader").show();

	jQuery.post(ajaxurl, {applicant_id:applicant_id, action:action, csv_nonce:csv_nonce }, function(response) {
		
		jQuery("#admin_ajax_loader").hide();
		
		window.location.href = csv_url+"?clm_csv_data="+response;

	});

}


function delBulk()
{
	var action 				= 'clm_del_bulk';
	
	var clm_del_bulk_nonce 	= jQuery("#clm_del_bulk_nonce").val();
	
	var arr = new Array();
	
	var x = 0;
	jQuery("input:checked").each(function(){
		arr.push(jQuery(this).attr("id"));
		x++;
	});
	
	if( x == 0 )
	{
		alert('No selected item to delete!');
		return;
	}
	
	jQuery("#admin_ajax_loader").show();
	
	data = JSON.stringify(arr);
	
	var xurl = ajaxurl+'?action='+action+'&clm_del_bulk_nonce='+clm_del_bulk_nonce;
	
	jQuery.post(xurl, {data:data}, function(response) {
		
		jQuery("#admin_ajax_loader").hide();
		
		paginationData();

	});
	
}


function showSettings()
{
	var action = 'clm_show_settings';
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery.get(ajaxurl, {action:action}, function(response) {
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#clm_admin_list").html(response);

	});
	
}


function clmsaveSettings()
{
	
	jQuery("#clm_settings_form").submit(function(e){
		
		e.preventDefault();
		
	});
	
	jQuery("#admin_ajax_loader").show();
	
	jQuery("#admin_update_settings_ajax_loader").show();
	
	
	var clm_save_settings_nonce		= jQuery("#clm_save_settings_nonce").val();
	
	var action						= 'clm_save_settings';
	
	var vehicles 					= jQuery("#clm_vehicles").val();
	
	var emails 						= jQuery("#clm_emails").val();
	
	var provinces 					= jQuery("#clm_provinces").val();
	
	var clm_clean_db 				= jQuery("#clm_clean_db").val();
	
	
	
	jQuery.post(ajaxurl, {vehicles:vehicles, action:action, emails:emails, clm_save_settings_nonce:clm_save_settings_nonce, clm_clean_db:clm_clean_db, provinces:provinces }, function(response) {
		
		jQuery("#admin_ajax_loader").hide();
		
		jQuery("#admin_update_settings_ajax_loader").html('<small>Settings Saved..</small>',function(){
			
			jQuery(this).fadeOut("medium");
			
		});

	});
	
	
	
}


function checkMail(email)
{
	var x = email;
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(x)){
		return true;
	} else {
		return false;
	}
}


/*
* @note: hash tag enabled
* @version: 1.2
*/

function detectHashChange($){

	$(window).on('hashchange', function() {

		//get hash in window
		$hashNow = window.location.hash.substring(1);

		//sanitize hash
		$cleanURL = $hashNow.replace(/[\|&;\$%@"<>\(\)\+,]/g, "");

		if( $cleanURL == 'settings' ){

			showSettings();

		}

		if( $cleanURL == 'form-manager' ) {

			showFM($);

		}

		if( $cleanURL == 'main' ) {

			getDataList($);

		}

	});

}

//use to get the hash if it exists on first load
jQuery(function ($) {

	if (window.location.hash.length != 0) {
    
		//get hash in window
		$hashNow = window.location.hash.substring(1);

		//sanitize hash
		$cleanURL = $hashNow.replace(/[\|&;\$%@"<>\(\)\+,]/g, "");

		if( $cleanURL == 'settings' ){

			showSettings();

		}

		if( $cleanURL == 'form-manager' ) {

			showFM($);

		}

		if( $cleanURL == 'main' ) {

			getDataList($);

		}

	} else {

		getDataList($);

	}

});


function showFM($){
				
	var action = 'clm_show_form_manager';

	$("#admin_ajax_loader").show();

	$.get(ajaxurl, {action:action}, function(response) {
		
		$("#admin_ajax_loader").hide();
		
		$("#clm_admin_list").html(response);

	});

}