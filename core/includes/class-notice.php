<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'wip_incoming_lite_admin_notice' ) ) {

	class wip_incoming_lite_admin_notice {

		/**
		 * Constructor
		 */

		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'wip_incoming_lite_notice_user_id_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );

			}

		}

		/**
		 * Dismiss notice.
		 */

		public function dismiss() {

			if ( isset( $_GET['wip-incoming-lite-dismiss'] ) ) {

				update_user_meta( get_current_user_id(), 'wip_incoming_lite_notice_user_id_' . get_current_user_id() , $_GET['wip-incoming-lite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );

			}

		}

		/**
		 * Admin notice.
		 */

		public function admin_notice() {

			global $pagenow;
			$redirect = ( 'admin.php' == $pagenow ) ? '?page=wip_incoming_lite_panel&wip-incoming-lite-dismiss=1' : '?wip-incoming-lite-dismiss=1';

		?>

            <div class="update-nag notice wip-incoming-lite-notice">

            	<div class="wip-incoming-lite-noticedescription">
					<strong><?php _e( 'Pay what you want to get a lifetime subscription for 13 WordPress themes and 1 WordPress plugin on ThemeinProgress.com', 'wip-incoming-lite' ); ?></strong><br/>
					<em><?php _e( '(Minimum price allowed €1)', 'wip-incoming-lite' ); ?></em><br/>
					<?php printf( '<a href="%1$s" class="dismiss-notice">'. __( 'Dismiss this notice', 'wip-incoming-lite' ) .'</a>', esc_url($redirect)); ?>
                </div>

                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/name-your-price-wordpress-bundle/?ref=2&campaign=wip-incoming-lite-notice' ); ?>" class="button"><?php _e( 'Name your price', 'wip-incoming-lite' ); ?></a>
                <div class="clear"></div>

            </div>

		<?php

		}

	}

}

new wip_incoming_lite_admin_notice();

?>
