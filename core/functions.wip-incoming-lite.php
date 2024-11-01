<?php

/**
 * Wp in Progress
 *
 * @package Wordpress
 * @theme Sueva
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* SETTINGS */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_setting')) {

	function wip_incoming_lite_setting($id, $default = "" ) {

		$wip_incoming_lite_setting = get_option("wip_incoming_settings");

		if(isset($wip_incoming_lite_setting[$id])):

			return $wip_incoming_lite_setting[$id];

		else:

			return $default;

		endif;

	}

}

/*-----------------------------------------------------------------------------------*/
/* JSON */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_jsonfile')) {

	function wip_incoming_lite_jsonfile( $name ) {

		global $pagenow;

		if ( $pagenow == 'admin.php' ) {

			if( function_exists('curl_init') ) {

				$ch = curl_init();

				curl_setopt ($ch, CURLOPT_URL, plugins_url('/core/admin/json/', dirname(__FILE__))  . $name );
				curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
				curl_setopt ($ch, CURLOPT_USERAGENT, 'WIP CUSTOM LOGIN JSONFILE');
				$file_contents = curl_exec($ch);
				curl_close($ch);

				$jsonfile = json_decode( $file_contents, true );

			} else {

				$file_contents = file_get_contents( plugins_url('/core/admin/json/', dirname(__FILE__))  . $name );
				$jsonfile = json_decode( $file_contents, true );

			}

			return $jsonfile;

		} else {

			return false;

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* GOOGLE FONTS */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_get_font')) {

	function wip_incoming_lite_get_font( $name, $type) {

		global $pagenow;

		if ( $pagenow == 'admin.php' ) {

			$jsonfile = wip_incoming_lite_jsonfile("googlefonts.json");

			$fontsarray = $jsonfile['items'];

			if (!function_exists('wip_incoming_lite_variants')) {

				function wip_incoming_lite_variants( $array ) {

					$search = array(

						"regular" => "400",
						"italic" => "400italic"

					);

					foreach ( $search as $key => $val ) {

						if ( in_array( $key, $array)) {

							$array[ array_search( $key, $array )]= $val;

						}

					}

					return $array;

				}

			}

			foreach ( $fontsarray as $font ) {

				$getfont[$font['family']] = implode( ",", wip_incoming_lite_variants( $font['variants']));
				$getlist[$font['family']] = $font['family'];

			}

			if ( $type == "getfont" ) :

				return $getfont[$name];

			else:

				return $getlist;

			endif;

		} else {

			return false;

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* FONT LIST */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_fontlist')) {

	function wip_incoming_lite_fontlist() {

		global $pagenow;

		if ( $pagenow == 'admin.php' ) {

			$fontsarray = array (

				'Montserrat',
				wip_incoming_lite_setting("wip_incoming_font")

			);

			$fonts = array_unique($fontsarray);

			foreach ( $fonts as $fontname ) {

				if ($fontname) {

					$fontlist[] = str_replace(" ","+", $fontname) . ":" . wip_incoming_lite_get_font( $fontname, "getfont" );

				}

			}

			return implode( "|", $fontlist);

		} else {

			return false;

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLE */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_style')) {

	function wip_incoming_lite_style() {

		$style = '';

		if ( wip_incoming_lite_setting('wip_incoming_font') )
			$style .= 'body, a, p, li, address, dd, blockquote, td, th { font-family: ' . wip_incoming_lite_setting('wip_incoming_font') . ',Verdana, Geneva, sans-serif;}';

		if ( wip_incoming_lite_setting('wip_incoming_textcolor') )
			$style .= 'body, a { color: ' . wip_incoming_lite_setting('wip_incoming_textcolor') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_titles_size') )
			$style .= 'h2 { font-size: ' . wip_incoming_lite_setting('wip_incoming_titles_size') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_logo_size') )
			$style .= '#logo { font-size: ' . wip_incoming_lite_setting('wip_incoming_logo_size') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_content_size') )
			$style .= 'body, .content, #copyright, .newsletter-form input[type=text], .newsletter-form input[type=submit], #logo span { font-size: ' . wip_incoming_lite_setting('wip_incoming_content_size') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_countdown_time_size') )
			$style .= 'ul#countdown li span.time { font-size: ' . wip_incoming_lite_setting('wip_incoming_countdown_time_size') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_countdown_text_size') )
			$style .= 'ul#countdown li span.time p { font-size: ' . wip_incoming_lite_setting('wip_incoming_countdown_text_size') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_wrapper_h_padding') )
			$style .= '#wrapper { padding-left: ' . wip_incoming_lite_setting('wip_incoming_wrapper_h_padding') . '; padding-right: ' . wip_incoming_lite_setting('wip_incoming_wrapper_h_padding') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_wrapper_v_padding') )
			$style .= '#wrapper { padding-top: ' . wip_incoming_lite_setting('wip_incoming_wrapper_v_padding') . '; padding-bottom: ' . wip_incoming_lite_setting('wip_incoming_wrapper_v_padding') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_wrapper_background_color') )
			$style .= '#wrapper { background-color: ' . wip_incoming_lite_setting('wip_incoming_wrapper_background_color') . ';}';

		if ( wip_incoming_lite_setting('wip_incoming_wrapper_opacity') )
			$style .= '#wrapper { opacity: ' . (wip_incoming_lite_setting('wip_incoming_wrapper_opacity')/100) . '; filter: alpha(opacity=' . wip_incoming_lite_setting('wip_incoming_wrapper_opacity') . ');}';

		if ( wip_incoming_lite_setting('wip_incoming_show_transparent_wrapper') == "on" )
			$style .= '#wrapper { background:none; opacity: 1;filter: alpha(opacity=100); }';

		if ( wip_incoming_lite_setting('wip_incoming_background_image') ) :

			$style .= "body { background-image: url('".wip_incoming_lite_setting('wip_incoming_background_image')."'); } ";
			$style .= "body { background-repeat: ".wip_incoming_lite_setting('wip_incoming_background_repeat', 'repeat')."; } ";
			$style .= "body { background-position: ".wip_incoming_lite_setting('wip_incoming_background_position', 'center')."; } ";
			$style .= "body { background-attachment: ".wip_incoming_lite_setting('wip_incoming_background_attachment', 'normal')." } ";

		endif;

		if ( !wip_incoming_lite_setting('wip_incoming_background_cover') || wip_incoming_lite_setting('wip_incoming_background_cover') == "on" )
			$style .= "body { -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover; } ";

		if ( wip_incoming_lite_setting('wip_incoming_button_color') ) :

			$style .= ".newsletter-form input[type=submit], .social-buttons a { background-color:".wip_incoming_lite_setting('wip_incoming_button_color','#f97e76')."; } ";
			$style .= ".newsletter-form input[type=submit] { border-color:".wip_incoming_lite_setting('wip_incoming_button_color','#f97e76')."; } ";

		endif;

		if ( wip_incoming_lite_setting('wip_incoming_button_hover_color') ) :

			$style .= ".newsletter-form input[type=submit]:hover, .social-buttons a:hover { background-color:".wip_incoming_lite_setting('wip_incoming_button_hover_color','#e0716a')."; } ";
			$style .= "a:hover{ color:".wip_incoming_lite_setting('wip_incoming_button_hover_color','#e0716a')."; } ";
			$style .= ".newsletter-form input[type=submit]:hover { border-color:".wip_incoming_lite_setting('wip_incoming_button_hover_color','#e0716a')."; } ";

		endif;

		if ( wip_incoming_lite_setting('wip_incoming_css_code') )
			$style .= wip_incoming_lite_setting('wip_incoming_css_code');

		if ( $style )

			echo '<style type="text/css">' . $style . '</style>';

	}

}

/*-----------------------------------------------------------------------------------*/
/* STYLE */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_social_buttons')) {

	function wip_incoming_lite_social_buttons() {

		$socials = array (

			"facebook" => array( "icon" => "fa fa-facebook" , "target" => "_blank" ),
			"twitter" => array( "icon" => "fa fa-twitter" , "target" => "_blank" ),
			"flickr" => array( "icon" => "fa fa-flickr" , "target" => "_blank" ),
			"google" => array( "icon" => "fa fa-google-plus" , "target" => "_blank" ),
			"linkedin" => array( "icon" => "fa fa-linkedin" , "target" => "_blank" ),
			"pinterest" => array( "icon" => "fa fa-pinterest" , "target" => "_blank" ),
			"tumblr" => array( "icon" => "fa fa-tumblr" , "target" => "_blank" ),
			"youtube" => array( "icon" => "fa fa-youtube" , "target" => "_blank" ),
			"skype" => array( "icon" => "fa fa-skype" , "target" => "_self" ),
			"instagram" => array( "icon" => "fa fa-instagram" , "target" => "_blank" ),
			"deviantart" => array( "icon" => "fa fa-deviantart" , "target" => "_blank" ),
			"github" => array( "icon" => "fa fa-github" , "target" => "_blank" ),
			"xing" => array( "icon" => "fa fa-xing" , "target" => "_blank" ),
			"whatsapp" => array( "icon" => "fa fa-whatsapp" , "target" => "_self" ),
			"email" => array( "icon" => "fa fa-envelope" , "target" => "_self" ),

		);

		$i = 0;

		$html = "";

		foreach ( $socials as $name => $attrs) {

			if ( wip_incoming_lite_setting( 'wip_incoming_'.$name.'_button') ):

				$i++;
				$html.= '<a href="'.esc_url(wip_incoming_lite_setting('wip_incoming_'.$name.'_button','#'), array( 'http', 'https', 'tel', 'skype', 'mailto' ) ).'" target="'.$attrs['target'].'" title="'.$name.'" class="social"> <i class="'.$attrs['icon'].'" ></i> </a> ';

			endif;

		}

		if ( $i > 0 ) {

			echo '<div class="social-buttons">' . $html . '</div>';

		}

	}

}

/*-----------------------------------------------------------------------------------*/
/* RANDOM BANNER */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('wip_incoming_lite_random_banner')) {

	function wip_incoming_lite_random_banner() {

		$plugin1  = '<h1>'. __( 'Upgrade to the premium version for free.', 'wip-incoming-lite') . '</h1>';
		$plugin1 .= '<p>'. __( 'Download now the premium version of WIP Incoming for free from our reserver area, to enable all features like a background slideshow.', 'wip-incoming-lite') . '</p>';
		$plugin1 .= '<div class="big-button">';
		$plugin1 .= '<a href="'.esc_url( 'https://www.themeinprogress.com/reserved-area/?ref=2&campaign=wip_incoming_lite').'" target="_blank">'.__( 'Download now', 'wip-incoming-lite').'</a>';
		$plugin1 .= '</div>';

		$plugin2  = '<h1>'. __( 'Internal Linking of Related Contents', 'wip-incoming-lite') . '</h1>';
		$plugin2 .= '<p>'. __( '<strong>Internal Linking of Related Contents</strong> WordPress plugin allow you to automatically insert related articles inside your WordPress posts.', 'wip-incoming-lite') . '</p>';
		$plugin2 .= '<div class="big-button">';
		$plugin2 .= '<a href="'.esc_url( 'https://www.themeinprogress.com/internal-linking-of-related-contents-pro/?aff=wil-panel').'" target="_blank">'.__( 'Download the free version, no email required', 'wip-incoming-lite').'</a>';
		$plugin2 .= '</div>';

		$plugin3  = '<h1>'. __( 'Chatbox Manager', 'wip-incoming-lite') . '</h1>';
		$plugin3 .= '<p>'. __( '<strong>Chatbox Manager</strong> WordPress plugin allow you to display multiple WhatsApp buttons on your website.', 'wip-incoming-lite') . '</p>';
		$plugin3 .= '<div class="big-button">';
		$plugin3 .= '<a href="'.esc_url( 'https://www.themeinprogress.com/chatbox-manager-pro/?aff=wil-panel').'" target="_blank">'.__( 'Download the free version, no email required', 'wip-incoming-lite').'</a>';
		$plugin3 .= '</div>';

		$plugin4  = '<h1>'. __( 'Content Snippet Manager', 'wip-incoming-lite') . '</h1>';
		$plugin4 .= '<p>'. __( '<strong>Content Snippet Manager</strong> WordPress plugin allow you to include every kind of code inside your Wordpress website.', 'wip-incoming-lite') . '</p>';
		$plugin4 .= '<div class="big-button">';
		$plugin4 .= '<a href="'.esc_url( 'https://www.themeinprogress.com/content-snippet-manager/?aff=wil-panel').'" target="_blank">'.__( 'Download the free version, no email required', 'wip-incoming-lite').'</a>';
		$plugin4 .= '</div>';

		$banner = array($plugin1,$plugin2,$plugin3,$plugin4);
		echo $banner[array_rand($banner)];

	}

}

?>
