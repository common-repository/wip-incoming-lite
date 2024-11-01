<?php

/*

	Plugin Name: WIP Incoming Lite
	Plugin URI: https://www.themeinprogress.com
	Description: WIP Incoming Lite is a free Coming Soon, Under Construction & Maintenance Mode WordPress plugin and allows you to manage a launch / under construction page for your WordPress website. <a href="https://www.themeinprogress.com" target="_blank">Get more themes and plugins for WordPress on <strong>ThemeinProgress</strong></a>
	Version: 1.1.1
	Text Domain: wip-incoming-lite
	Author: Theme in Progress
	Author URI: https://www.themeinprogress.com
	License: GPL2
	Domain Path: /languages/

	Copyright 2024  ThemeinProgress  (email : info@wpinprogress.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

if( !class_exists( 'wip_incoming_lite_init' ) ) {

	class wip_incoming_lite_init {

		/**
		* Constructor
		*/

		public function __construct(){

			add_action('plugins_loaded', array(&$this,'plugin_setup'));
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_action_links' ), 10, 2 );
			add_action('template_redirect' , array(&$this,'plugin_function') );

		}

		/**
		* Plugin settings link
		*/

		public function plugin_action_links( $links ) {

			$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=wip_incoming_lite_panel') ) .'">' . __('Settings','wip-incoming-lite') . '</a>';
			return $links;

		}

		/**
		* Plugin setup
		*/

		public function plugin_setup() {

			load_plugin_textdomain( 'wip-incoming-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
			require_once dirname(__FILE__) . '/core/includes/class-notice.php';
			require_once dirname(__FILE__) . '/core/includes/class-panel.php';

			if ( is_admin() == 1 )
				require_once dirname(__FILE__) . '/core/admin/panel.php';

		}

		/**
		* Google Fonts
		*/

		public function google_fonts() {

			if ( wip_incoming_lite_setting('wip_incoming_charset') ):

				$charset = implode(",", wip_incoming_lite_setting('wip_incoming_charset') );

			else:

				$charset = 'latin,latin-ext';

			endif;

			$fonts_args = array(
				'family' => get_option( 'wip_incoming_fontlist', 'Montserrat' ),
				'subset' => $charset
			);

			return	add_query_arg ( $fonts_args, '//fonts.googleapis.com/css' );

		}

		/**
		* Get time
		*/

		public function get_time( $type, $del = '' ) {

			$time = wip_incoming_lite_setting('wip_incoming_countdown');

			if ( $time[$type] )
				return $time[$type] . $del;

		}

		/**
		* Slideshow script
		*/

		public function slideshow_script() {

			if ( wip_incoming_lite_setting('wip_incoming_slideshow') && wip_incoming_lite_setting('wip_incoming_show_slideshow') == "on" ) : ?>

				<script type="text/javascript">

                    jQuery.noConflict()(function($) {

                            $('body').vegas({

                                delay:	7000,
                                slides: [

                                    <?php
                                        foreach ( wip_incoming_lite_setting('wip_incoming_slideshow') as $image_url ) {
                                            echo "{ src: '".$image_url['url']."' },";
                                        }
                                    ?>

                                ]

                            });

                    });

                </script>

		<?php

			endif;

		}

		/**
		* Countdown script
		*/

		public function countdown_script() {

			if ( wip_incoming_lite_setting('wip_incoming_countdown') && wip_incoming_lite_setting('wip_incoming_show_countdown') == "on" ) : ?>

				<script type="text/javascript">

                    jQuery.noConflict()(function($) {

                        $('#countdown').countdown({

                            date: '<?php echo $this->get_time('date',' ') . $this->get_time('time') ; ?>',

                        }, function () {

                            $('#countdown').remove();

                        });

                    });

                </script>

		<?php

			endif;

		}

		/**
		* Incoming
		*/

		public function plugin_function()  {

			if ( !is_user_logged_in() && wip_incoming_lite_setting('wip_incoming_active') == "on" ) :

				require_once dirname(__FILE__) . '/templates/layout.php';
				exit;

			endif;

		}

	}

	new wip_incoming_lite_init();

}

require_once dirname(__FILE__) . '/core/functions.wip-incoming-lite.php';

?>
