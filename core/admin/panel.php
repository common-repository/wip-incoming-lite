<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$optpanel = array (

	array (	"name" => "Navigation",  
			"type" => "navigation",  
			"item" => array( 
			
				"Settings"			=> __( "Settings","wip-incoming-lite"),
				"Header"			=> __( "Header","wip-incoming-lite"),
				"Colors"			=> __( "Colors","wip-incoming-lite"),
				"Background"		=> __( "Background","wip-incoming-lite"),
				"Newsletter"		=> __( "Newsletter","wip-incoming-lite"),
				"Social_buttons"	=> __( "Social buttons","wip-incoming-lite"),
				"Import_Export"		=> __( "Import/Export","wip-incoming-lite"),
			
			),   
			
			"start" => "<ul>", 
			"end" => "</ul>"
	),  

	array(	"tab" => "Settings",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Settings"),

			array(	"type" => "start-open-container",
					"name" => __( "Settings","wip-incoming-lite")),

				array(	"name" => __( "Active Incoming.","wip-incoming-lite"),
						"desc" => __( "Do you want to enable WIP Incoming plugin?","wip-incoming-lite"),
						"id" => "wip_incoming_active",
						"type" => "on-off",
						"std" => "off"),

				array(	"name" => __( "Character sets","wip-incoming-lite"),
						"desc" => __( "Choose the character sets you want:","wip-incoming-lite"),
						"id" => "wip_incoming_charset",
						"type" => "multioptions",
						"options" => array(
							"latin" => __( "Latin","wip-incoming-lite"),
							"latin-ext" => __( "Latin Extended","wip-incoming-lite"),
							"cyrillic" => __( "Cyrillic","wip-incoming-lite"),
							"cyrillic-ext" => __( "Cyrillic Extended","wip-incoming-lite"),
							"greek" => __( "Greek","wip-incoming-lite"),
							"greek-ext" => __( "Greek Extended","wip-incoming-lite"),
							"vietnamese" => __( "Vietnamese","wip-incoming-lite"),
						),
				),

				array(	"name" => __( "Font","wip-incoming-lite"),
						"desc" => __( "Select the main font of coming soon page.","wip-incoming-lite"),
						"id" => "wip_incoming_font",
						"type" => "select",
						"options" => wip_incoming_lite_get_font("", "getlist"),
						"std" => "Montserrat"),

				array(	"name" => __( "Titles size","wip-incoming-lite"),
						"desc" => __( "Choose a size for titles","wip-incoming-lite"),
						"id" => "wip_incoming_titles_size",
						"type" => "select",
							"options" => wip_incoming_lite_jsonfile("fontsizes.json"),
						"std" => "24px"),

				array(	"name" => __( "Content size","wip-incoming-lite"),
						"desc" => __( "Choose a size for the content","wip-incoming-lite"),
						"id" => "wip_incoming_content_size",
						"type" => "select",
							"options" => wip_incoming_lite_jsonfile("fontsizes.json"),
						"std" => "14px"),

				array(	"name" => __( "Content.","wip-incoming-lite"),
						"desc" => __( "Add the content of your coming soon page.","wip-incoming-lite"),
						"id" => "wip_incoming_content",
						"type" => "editor",
						"std" => ""),

				array(	"name" => __( "Horizontal wrapper padding.","wip-incoming-lite"),
						"desc" => __( "Insert the top and bottom padding of wrapper.","wip-incoming-lite"),
						"id" => "wip_incoming_wrapper_h_padding",
						"type" => "text",
						"std" => "60px"),

				array(	"name" => __( "Vertical wrapper padding.","wip-incoming-lite"),
						"desc" => __( "Insert the left and right padding of wrapper.","wip-incoming-lite"),
						"id" => "wip_incoming_wrapper_v_padding",
						"type" => "text",
						"std" => "120px"),

				array(	"name" => __( "Wrapper opacity","wip-incoming-lite"),
						"desc" => __( "Insert the opacity of wrapper (Add a value between 0 and 100).","wip-incoming-lite"),
						"id" => "wip_incoming_wrapper_opacity",
						"type" => "text",
						"std" => "90"),

				array(	"name" => __( "Transparent wrapper.","wip-incoming-lite"),
						"desc" => __( "Do you want to make transparent the wrapper?","wip-incoming-lite"),
						"id" => "wip_incoming_show_transparent_wrapper",
						"type" => "on-off",
						"std" => "off"),

				array(	"name" => __( "Custom Css.","wip-incoming-lite"),
						"desc" => __( "Insert your custom css code.","wip-incoming-lite"),
						"id" => "wip_incoming_css_code",
						"type" => "textarea",
						"std" => ""),

				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Settings"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),

	array(	"tab" => "Header",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Header"),

			array(	"type" => "start-open-container",
					"name" => __( "Countdown","wip-incoming-lite")),

				array(	"name" => __( "Logo","wip-incoming-lite"),
						"desc" => __( "Upload your logo.","wip-incoming-lite"),
						"id" => "wip_incoming_logo_image",     
						"data" => "array",
						"type" => "upload",
						"std" => ""),

				array(	"name" => __( "Logo font size","wip-incoming-lite"),
						"desc" => __( "Choose a size for logo","wip-incoming-lite"),
						"id" => "wip_incoming_logo_size",
						"type" => "select",
							"options" => wip_incoming_lite_jsonfile("fontsizes.json"),
						"std" => "40px"),

				array(	"name" => __( "Countdown.","wip-incoming-lite"),
						"desc" => __( "Do you want to enable the countdown?","wip-incoming-lite"),
						"id" => "wip_incoming_show_countdown",
						"type" => "on-off",
						"std" => "off"),

				array(	"name" => __( "Countdown time size","wip-incoming-lite"),
						"desc" => __( "Choose a size for the countdown time (only the numbers)","wip-incoming-lite"),
						"id" => "wip_incoming_countdown_time_size",
						"type" => "select",
							"options" => wip_incoming_lite_jsonfile("fontsizes.json"),
						"std" => "60px"),

				array(	"name" => __( "Countdown text size","wip-incoming-lite"),
						"desc" => __( "Choose a size for the countdown text (only the text like 'day','hours' etc)","wip-incoming-lite"),
						"id" => "wip_incoming_countdown_text_size",
						"type" => "select",
							"options" => wip_incoming_lite_jsonfile("fontsizes.json"),
						"std" => "25px"),

				array(	"name" => __( "Countdown end.","wip-incoming-lite"),
						"desc" => __( "Set the end of the countdown.","wip-incoming-lite"),
						"id" => "wip_incoming_countdown",
						"type" => "countdown",
						"std" => ""),
			
				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Header"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),

	array(	"tab" => "Colors",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Colors"),

			array(	"type" => "start-open-container",
					"name" => __( "Colors","wip-incoming-lite")),
				
				array(	"name" => __( "Wrapper background","wip-incoming-lite"),
						"desc" => __( "Choose a color for wrapper background.","wip-incoming-lite"),
						"id" => "wip_incoming_wrapper_background_color",
						"type" => "color",
						"std" => "#fff"),
				
				array(	"name" => __( "Text color","wip-incoming-lite"),
						"desc" => __( "Choose a color for the text.","wip-incoming-lite"),
						"id" => "wip_incoming_textcolor",
						"type" => "color",
						"std" => "#616161"),

				array(	"name" => __( "Button color","wip-incoming-lite"),
						"desc" => __( "Choose a color for buttons.","wip-incoming-lite"),
						"id" => "wip_incoming_button_color",
						"type" => "color",
						"std" => "#f97e76"),

				array(	"name" => __( "Button color at hover","wip-incoming-lite"),
						"desc" => __( "Choose a color for buttons at hover.","wip-incoming-lite"),
						"id" => "wip_incoming_button_hover_color",
						"type" => "color",
						"std" => "#e0716a"),

				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Colors"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),
	
	array(	"tab" => "Background",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Background"),

			array(	"type" => "start-open-container",
					"name" => __( "Background","wip-incoming-lite")),
			
				array(	"name" => __( "Background Color","wip-incoming-lite"),
						"desc" => __( "Choose a color for body background.","wip-incoming-lite"),
						"id" => "wip_incoming_background_color",
						"type" => "color",
						"std" => "#f1f1f1"),
				
				array(	"name" => __( "Custom image background","wip-incoming-lite"),
						"desc" => __( "Upload a image for body background.","wip-incoming-lite"),
						"id" => "wip_incoming_background_image",     
						"data" => "array",
						"type" => "upload",
						"class" => "hidden-element",
						"std" => ""),
				
				array(	"name" => __( "Repeat","wip-incoming-lite"),
						"desc" => __( "Repeat","wip-incoming-lite"),
						"id" => "wip_incoming_background_repeat",
						"type" => "select",
						"options" => array(
							"" => "None",
							"repeat" => __( "Repeat","wip-incoming-lite"),
							"no-repeat" => __( "No repeat","wip-incoming-lite"),
							"repeat-x" => __( "Repeat orizzontal","wip-incoming-lite"),
							"repeat-y" => __( "Repeat vertical","wip-incoming-lite"),
						),
						"std" => "repeat"),
				
				array(	"name" => __( "Background Position","wip-incoming-lite"),
						"desc" => __( "Background Position","wip-incoming-lite"),
						"id" => "wip_incoming_background_position",
						"type" => "select",
						"options" => array(
							"" => "None",
							"top left" => "top left",
							"top center" => "top center",
							"top right" => "top right",
							"center" => "center",
							"bottom left" => "bottom left",
							"bottom center" => "bottom center",
							"bottom right" => "bottom right",
						),
						"std" => ""),
				
				array(	"name" => __( "Background Attachment","wip-incoming-lite"),
						"desc" => __( "Background Attachment","wip-incoming-lite"),
						"id" => "wip_incoming_background_attachment",
						"type" => "select",
						"options" => array(
							"normal" => "normal",
							"fixed" => "fixed",
						),
						"std" => "normal"),

				array(	"name" => __( "Background cover.","wip-incoming-lite"),
						"desc" => __( "Do you want to show a full background image, using the 'CSS3 cover' rule?","wip-incoming-lite"),
						"id" => "wip_incoming_background_cover",
						"type" => "on-off",
						"std" => "on"),

				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Background"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),
	
	array(	"tab" => "Newsletter",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Newsletter"),

			array(	"type" => "start-open-container",
					"name" => __( "Countdown","wip-incoming-lite")),

				array(	"name" => __( "Newsletter.","wip-incoming-lite"),
						"desc" => __( "Do you want to enable the newsletter section?","wip-incoming-lite"),
						"id" => "wip_incoming_show_newsletter",
						"type" => "on-off",
						"std" => "off"),

				array(	"name" => __( "Title","wip-incoming-lite"),
						"desc" => __( "Add the title of newsletter (leave empty if you want to hide the title)","wip-incoming-lite"),
						"id" => "wip_incoming_newsletter_title",
						"type" => "text",
						"std" => ""),

				array(	"name" => __( "URL action","wip-incoming-lite"),
						"desc" => __( "Set the action url of your form.","wip-incoming-lite"),
						"id" => "wip_incoming_newsletter_url_action",
						"type" => "text",
						"std" => ""),

				array(	"name" => __( "EMAIL name attribute","wip-incoming-lite"),
						"desc" => __( "Add the 'name' attribute of the email field.","wip-incoming-lite"),
						"id" => "wip_incoming_newsletter_email_name",
						"type" => "text",
						"std" => "EMAIL"),

				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Newsletter"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),
	
	array(	"tab" => "Social_buttons",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Social_buttons"),

			array(	"type" => "start-open-container",
					"name" => __( "Social buttons", "wip-incoming-lite")),
			
				array(	"name" => __( "Facebook Url","wip-incoming-lite"),
						"desc" => __( "Insert Facebook Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_facebook_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Twitter Url","wip-incoming-lite"),
						"desc" => __( "Insert Twitter Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_twitter_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "Flickr Url","wip-incoming-lite"),
						"desc" => __( "Insert Flickr Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_flickr_button",
						"type" => "text",
						"std" => ""),
				
				array(	"name" => __( "Google Url","wip-incoming-lite"),
						"desc" => __( "Insert Google Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_google_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "Linkedin Url","wip-incoming-lite"),
						"desc" => __( "Insert Linkedin Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_linkedin_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "Pinterest Url","wip-incoming-lite"),
						"desc" => __( "Insert Pinterest Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_pinterest_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Tumblr Url","wip-incoming-lite"),
						"desc" => __( "Insert Tumblr Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_tumblr_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "Youtube Url","wip-incoming-lite"),
						"desc" => __( "Insert Youtube Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_youtube_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Skype Url","wip-incoming-lite"),
						"desc" => __( "Insert Skype ID (leave empty if you want to hide the button), you can add <strong>'skype:'</strong>, after your ID (for example skype:alexvtn)","wip-incoming-lite"),
						"id" => "wip_incoming_skype_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Instagram  Url","wip-incoming-lite"),
						"desc" => __( "Insert Instagram Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_instagram_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "Github  Url","wip-incoming-lite"),
						"desc" => __( "Insert Github Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_github_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Xing  Url","wip-incoming-lite"),
						"desc" => __( "Insert Xing Url (leave empty if you want to hide the button)","wip-incoming-lite"),
						"id" => "wip_incoming_xing_button",
						"type" => "text",
						"std" => ""),
			
				array(	"name" => __( "WhatsApp number","wip-incoming-lite"),
						"desc" => __( "Insert WhatsApp number (leave empty if you want to hide the button), you can add <strong>'tel:</strong>', for start a call (for example tel:+39333122333)","wip-incoming-lite"),
						"id" => "wip_incoming_whatsapp_button",
						"type" => "text",
						"std" => ""),
					   
				array(	"name" => __( "Email Address","wip-incoming-lite"),
						"desc" => __( "Insert Email Address (leave empty if you want to hide the button), you can add <strong>'mailto:</strong>', after your email (for example mailto:info@wpinprogress.com)","wip-incoming-lite"),
						"id" => "wip_incoming_email_button",
						"type" => "text",
						"std" => ""),

				array(	"type" => "save-button",
						"value" => "Save",
						"class" => "Social buttons"),
			
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),
	
	array(	"tab" => "Import_Export",
			"element" =>
		   
		array(	"type" => "start-form",
				"name" => "Import_Export"),

			array(	"type" => "start-open-container",
					"name" => __( "Import / Export", "wip-incoming-lite")),
			
				array(	"name" => __( "Import / Export", "wip-incoming-lite"),
						"type" => "import_export"),
				
			array(	"type" => "end-container"),

		array(	"type" => "end-form"),

	),
	
	array(	"type" => "end-tab"),

	array(	"type" => "end-panel"),  

);

new wip_incoming_lite_panel ($optpanel);

?>