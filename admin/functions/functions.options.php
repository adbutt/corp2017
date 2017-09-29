<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
		
		$wp_tax = array(-1 => 'Choose a category');
		$catalog_terms = get_terms('team_member_team_categories');
		if ($catalog_terms) {
		    foreach ($catalog_terms as $catalog_term) {
		        $wp_tax[$catalog_term->term_id] = $catalog_term->slug;
		    }
		}
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Home Settings",
						"type" 		=> "heading"
				);
$of_options[] = array( 	"name" 		=> "Latest News Category",
						"desc" 		=> "Select a category to list the latest news on the homepage",
						"id" 		=> "lnews_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);
$of_options[] = array( "name" => "Newsletter Title",
					"desc" => "Enter the title for the Newsletter Feature Box",
					"id" => "news_title_id",
					"std" => "Want to know more",
					"type" => "text");
$of_options[] = array( "name" => "Newsletter Blurb",
					"desc" => "Enter the blurb for the Newsletter Feature Box",
					"id" => "news_blurb",
					"std" => "I am the blurb to entice people to signup",
					"type" => "textarea");		
$of_options[] = array( "name" => "Newsletter Form ID",
					"desc" => "Enter the ID for the newsletter form to appear on the homepage",
					"id" => "news_form_id",
					"std" => "",
					"type" => "text");	
$of_options[] = array( 	"name" 		=> "Sections Category",
						"desc" 		=> "Select a category to list content sections",
						"id" 		=> "section_category",
						"std" 		=> "Select a category:",
						"type" 		=> "select",
						"options" 	=> $of_categories
				);
$of_options[] = array( 	"name" 		=> "Our Team",
						"desc" 		=> "Select a category to list the exec team",
						"id" 		=> "exec_category",
						"std" 		=> "",
						"type" 		=> "select",
						"options" 	=> $wp_tax
				);
$of_options[] = array( 	"name" 		=> "Our Board",
						"desc" 		=> "Select a category to list the board members",
						"id" 		=> "board_category",
						"std" 		=> "",
						"type" 		=> "select",
						"options" 	=> $wp_tax
				);

	//SEO Settings
$of_options[] = array( "name" => "SEO Settings",
					"type" => "heading");	
					
$of_options[] = array( "name" => "Input the meta keywords ",
					"desc" => "Separate each keyword with a comma.",
					"id" => "meta_keywords",
					"std" => "",
					"type" => "text");						
					
$of_options[] = array( "name" => "Input the meta description ",
					"desc" => "Say a few words about the site.",
					"id" => "meta_description",
					"std" => "",
					"type" => "textarea");
					
$of_options[] = array( "name" => "Google Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer",
					"id" => "google_analytics",
					"std" => "",
					"type" => "textarea");   					

//Contact Options					
					
$of_options[] = array( "name" => "Contact Settings",
					"type" => "heading");	

$of_options[] = array( "name" => "Company Name",
					"desc" => "Enter Company Name",
					"id" => "company_contact",
					"std" => "Workpower",
					"type" => "text");	

$of_options[] = array( "name" => "Contact Number",
					"desc" => "Enter main contact number",
					"id" => "contact_number",
					"std" => "(08) 9445 6500",
					"type" => "text");

$of_options[] = array( "name" => "Contact Address",
					"desc" => "Enter main Address",
					"id" => "contact_address",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Google Map Link",
					"desc" => "Enter link to Google Map",
					"id" => "contact_map",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Contact Form ID",
					"desc" => "Enter the ID for the contact form to appear in the dropdown",
					"id" => "contact_form_id",
					"std" => "",
					"type" => "text");													

$of_options[] = array( "name" => "Facebook",
					"desc" => "Link to your Facebook page.",
					"id" => "social_facebook",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Twitter",
					"desc" => "Link to your Twitter profile.",
					"id" => "social_twitter",
					"std" => "",
					"type" => "text"); 					
					
$of_options[] = array( "name" => "Google+",
					"desc" => "Link to your Google+ profile.",
					"id" => "social_google",
					"std" => "",
					"type" => "text"); 					
// Backup Options
$of_options[] = array( 	"name" 		=> "Maintenance",
						"type" 		=> "heading",
				);
				
$of_options[] = array( 	"name" 		=> "Enable Maintenance Mode",
						"id" 		=> "site_maintenance",
						"std" 		=> "0",
						"type" 		=> "checkbox",
						"desc" 		=> 'Click to enable admin access only',
				);
				
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
