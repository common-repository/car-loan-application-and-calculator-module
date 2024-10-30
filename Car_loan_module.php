<?php
/*
Plugin Name: Car Loan Module
Plugin URI: https://github.com/darryldecode
Description: Let's you deploy an application form and car loan calculator then manage all stuff beautifully in admin page.
Version: 1.1
Author: Darryl Fernandez | Darrylcoder
Author URI: https://github.com/darryldecode
License: GPLv2
Compatibility: Up to WordPress Version 3.6.1
*/



/*
* ----------------------------------------------------
*
* Define all path of the car module plugin
*
* @version 1.0
*
* ------------------------------------
*/
define('CLM_PATH', plugin_dir_path(__FILE__));

define('CLM_PATH_libs',	CLM_PATH.'/libs/');

define('CLM_URI_',		plugins_url('/',__FILE__));

define('CLM_URI_libs',	plugins_url('/libs/', __FILE__));

define('CLM_URI_css',	plugins_url('/resources/css/', __FILE__));

define('CLM_URI_js',	plugins_url('/resources/js/', __FILE__));

define('CLM_URI_img',	plugins_url('/resources/img/', __FILE__));



//plugin database class
require_once CLM_PATH_libs . 'classes/database.class.php';
require_once CLM_PATH_libs . 'classes/clm-form.class.php';


//plugin configuation
require_once CLM_PATH . 'clm-config.php';



//lets require all model
foreach (glob(CLM_PATH . "model/*.php") as $filename)
{
    require_once $filename;
}

//lets require all controller
foreach (glob(CLM_PATH . "controller/*.php") as $filename)
{
    require_once $filename;
}

//lets require all files in views
foreach (glob(CLM_PATH . "view/*.php") as $filename)
{
    require_once $filename;
}




/*
* --------------------------------------------
*
* run the session if it is not yet running
* this is for the captcha purpose
*
* ---------------------------
*/
function register_session()
{
	if( !session_id())
		session_start();
}
add_action('init','register_session');





/*
* -------------------------------------------
*
* Below is Plugin's Boot System (core)
*
* @note:
* initialize all process for plugin
*
* ----------------------------
*/




/*
* -------------------------------------------
*
* do things when activated
*
* When plugin is activated, it creates a table
* and creates the options needed
*
* ----------------------------
*/
function clm_activation_process()
{
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	global $wpdb;

	$clm_applicants = $wpdb->prefix . "clm_applicants";
	
	$clm_co_buyers 	= $wpdb->prefix . "clm_co_buyers";
	
	$clm_records 	= $wpdb->prefix . "clm_records";
	
	$sql1 	= 	"CREATE TABLE IF NOT EXISTS $clm_applicants (
					applicant_id INT(11) AUTO_INCREMENT PRIMARY KEY,
					first_name VARCHAR( 255 ) NOT NULL ,
					initial_name VARCHAR( 255 ) NOT NULL ,
					last_name VARCHAR( 255 ) NOT NULL,
					email_address VARCHAR( 255 ) NOT NULL,
					home_phone VARCHAR( 255 ) NOT NULL,
					applicant_meta LONGTEXT NOT NULL
				);";
									
	$sql2 	= 	"CREATE TABLE IF NOT EXISTS $clm_co_buyers (
					co_buyer_id INT(11) AUTO_INCREMENT PRIMARY KEY,
					applicant_id INT(11),
					first_name VARCHAR( 255 ) NOT NULL ,
					initial_name VARCHAR( 255 ) NOT NULL ,
					last_name VARCHAR( 255 ) NOT NULL,
					co_buyer_meta LONGTEXT NOT NULL,
					FOREIGN KEY (applicant_id) REFERENCES $clm_applicants(applicant_id)
					ON DELETE CASCADE
				);";
	
	dbDelta( $sql1 );
	dbDelta( $sql2 );
	
	
	$admin_email 	= get_option( 'admin_email', 'sample@email.com' );
	
	$provinces 		= array( 'usa', 'canada' );
	$provinces 		= serialize( $provinces );
	
	$vehicles 		= array( 'sedan', 'coupe', 'suv', 'pick-up', 'van' );
	$vehicles 		= serialize( $vehicles );
	
	$clm_emails 	= array( $admin_email );
	$clm_emails		= serialize( $clm_emails );
	
	
	$clm_version	= '1.1';
	
	$clm_clean_db	= 'no';
	
	add_option('clm_vehicles', 	$vehicles );
	
	add_option('clm_provinces', $provinces );
	
	add_option('clm_emails', 	$clm_emails );
	
	add_option('clm_clean_db', 	$clm_clean_db );
	
	
	//versioning
	
	if ( !get_option('clm_version') )
	{
		
		add_option('clm_version', 	$clm_version );
		
	} else {
		
		update_option( 'clm_version', 	$clm_version );
		
	}

}
register_activation_hook(__FILE__, 'clm_activation_process');





/*
* -----------------------------------------------------------
*
* do things when deactivated
*
* the deactivation process has a condition
* the deactivation option name "clm_clean_db" is by default set to false
* this is the option wether to clean the database upon deactivation or not
* if this is set to yes, clm tables are all deleted so as the options too
*
* --------------------------------------
*/
function clm_deactivation_process()
{
	
	$clm_clean_db = get_option('clm_clean_db');
	
	if( $clm_clean_db == 'yes' )
	{
		
		global $wpdb;
		
		$tbl1 	= $wpdb->prefix . 'clm_applicants';
		
		$tbl2 	= $wpdb->prefix . 'clm_co_buyers';
		
		$tbl3 	= $wpdb->prefix . 'clm_records';
		
		$wpdb->query("DROP TABLE IF EXISTS $tbl3");
		
		$wpdb->query("DROP TABLE IF EXISTS $tbl2");
		
		$wpdb->query("DROP TABLE IF EXISTS $tbl1");
		
		delete_option('clm_vehicles');
		
		delete_option('clm_provinces');
	
		delete_option('clm_emails');
		
		delete_option('clm_version');
		
		delete_option('clm_clean_db');
	
	}
	
}
register_deactivation_hook(__FILE__, 'clm_deactivation_process');





/*
* load JS and styles scripts for admin
****************************************/
function clm_admin_js_and_css_files()
{

	wp_register_style( 'clm_jquery_ui_css', CLM_URI_libs.'jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.min.css', false, '1.0.0' );
	wp_register_style( 'clm_admin_css', CLM_URI_css.'admin-style-clm.css', false, '1.0.0' );
	wp_register_script( 'clm_jquery_ui_js', CLM_URI_libs.'jquery-ui/jquery-ui-1.10.3.custom.min.js', false, '1.0.0' );
	wp_register_script( 'clm_admin_script', CLM_URI_js.'admin-script-clm.js', array( 'jquery' ) );
	wp_register_script( 'clm_admin_script_form_manager', CLM_URI_js.'admin-script-form-manager-clm.js', array( 'jquery' ) );
	
	if( isset($_GET['page']) )
	{
		
		$page_now = strip_tags($_GET['page']);
		
		if( $page_now == 'car-loan-manager' )
		{
			wp_enqueue_style( 'clm_jquery_ui_css' );
			wp_enqueue_style( 'clm_admin_css' );
			wp_enqueue_script( 'clm_jquery_ui_js' );
			wp_enqueue_script( 'clm_admin_script' );
			wp_enqueue_script( 'clm_admin_script_form_manager' );
		}
		
	}
	

}
add_action('admin_enqueue_scripts', 'clm_admin_js_and_css_files');





/*
* print relevant scripts on header
****************************************/
function clm_front_print_scripts()
{
	
	?>
    
    <link type="text/css" rel="stylesheet" href="<?php echo CLM_URI_css.'front-style-clm.css'; ?>" />
    
    <script type="text/javascript">
		var ajaxURL = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>
    
    <?php
	
}
add_action('wp_head', 'clm_front_print_scripts','10');

function clm_load_Scripts()
{
	
	wp_register_script( 'clm_front_script', CLM_URI_js.'front-script-clm.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'clm_front_script' );
	
}
add_action('wp_enqueue_scripts', 'clm_load_Scripts');





/* 
* add submenu on settings
***************************/
function add_clm_menu()
{
	
	$page_title		= 'Car Loan Manager';
	$menu_title		= 'CLM';
	$capability		= 'activate_plugins';
	$menu_slug		= 'car-loan-manager';
	$function		= 'car_loan_manager';
	$icon_url		= CLM_URI_img.'clm-icon.png';
	$position		= 4;
	
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
add_action('admin_menu', 'add_clm_menu');




/* 
* call the display on admin page
*********************************/
function car_loan_manager()
{
	clm_display_admin_page();
}



/*
* --------------------------------------------
*
* DashBoard Widget
* @version: 1.0
*
* -------------------------------
*
*/ 
function clm_dashboard_widget() { 
 
    wp_add_dashboard_widget('dashboard_widget', 'Car Loan Manager', 'clm_display_dashboard_widget'); 
	
} 

add_action('wp_dashboard_setup', 'clm_dashboard_widget' );  

